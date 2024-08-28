<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helper\helperController;
use App\Mail\NotifMail;
use App\Models\product;
use App\Models\transaction;
use App\Models\transactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::whereIn('category', ['food', 'drink'])->where('status', 'on')->get();
        $payload = [
            'product' =>$products
        ];
       return view('restaurant.index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->all();
        DB::beginTransaction();
        try {
            $validatedData = request()->validate([
                'name' => 'required',
                'name_room' => 'required',
                'no_wa' => 'required|numeric',
                'date' => 'required',
                'time' => 'required',
            ]);
            $payload = [
                'name' => $validatedData['name'],
                'name_room' => $validatedData['name_room'],
                'no_wa' => $validatedData['no_wa'],
                'date' => $validatedData['date'],
                'time' => $validatedData['time'],
                'uid' => (new helperController)->getUid()
            ];
            $transaction = transaction::create($payload);
            $selectedItems = json_decode(request()->input('selected_items'), true);
            foreach ($selectedItems as $value) {
                $products = product::where('uid', $value['uid'])->first();
                $payloadData = [
                    'uid' => (new helperController)->getUid(),
                    'product_uid' => $value['uid'],
                    'qty' => $value['qty'],
                    'price' => $products->price,
                    'transaction_uid'=> $transaction->uid,
                ];
               transactionDetails::create($payloadData);
            }
            Mail::to("joko12prasetio@gmail.com")->send(new NotifMail($payload));
            DB::commit();
            return back()->with(['alertSuccess' => 'Berhasil memesan makanan']);
        } catch (\Throwable $th) {
            dd($th);
        DB::rollBack();
           return back()->with(['alertError' => 'gagal memesan makanan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function requestOrder(){
        $transaction = transaction::where('status', 'pending')->get();
        $transactions = $transaction->map(function ($transaction) {
            $totalPrice = $transaction->transactionDetail->sum(function ($detail) {
                return $detail->price * $detail->qty; // Mengalikan harga dengan kuantitas
            });
            $transaction->total_price = $totalPrice;
            return $transaction;
        });

        $payload = [
            'transaction' => $transactions
        ];
        return view('restaurant.request.index', $payload);
    }

    public function approvedOrder(string $uid){
        try {
            $transaction = transaction::where('uid', $uid)->first();
            $payload = [
                'status' => 'approved'
            ];
            $transaction->update($payload);
            return back()->with(['alertSuccess' => 'Berhasi, Konfirmasi pesanan ini !']);
        } catch (\Throwable $th) {
           return back()->with(['alertError' => 'Gagal Konfirmasi pesanan ini!']);
        }
    }

    public function rejectOrder(string $uid){
        try {
            $transaction = transaction::where('uid', $uid)->first();
            $payload = [
                'status' => 'approved'
            ];
            $transaction->update($payload);
            return back()->with(['alertSuccess' => 'Berhasi, Konfirmasi pesanan ini !']);
        } catch (\Throwable $th) {
           return back()->with(['alertError' => 'Gagal Konfirmasi pesanan ini!']);
        }
    }

    public function detailOrder(string $uid){
        $transaction = transaction::where('uid', $uid)->first();
        return $transaction;
    }

    public function downloadReport(){
        $startdate = request()->input('start_date');
        $enddate = request()->input('end_date');
        try {
            $tempStart = $startdate . " 00:00:00";
            $tempEnddate = $enddate . " 23:59:59";
            $transaction = transaction::whereBetween('created_at', [$tempStart, $tempEnddate])->whereNotIn('status', ['pending'])->get();
            $filename = "Laporan $startdate - $enddate.xlsx";
            $row = 4;
            $spreedsheet = new Spreadsheet();
            $sheet = $spreedsheet->getActiveSheet();
            $styles = [
                'title' => [
                    'font' => [
                        'bold' => true
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ]
                ],
                'header' => [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'startColor' => [
                            'argb' => Color::COLOR_YELLOW,
                        ],
                    ],
                ],
                'currency' => [
                    'numberFormat' => [
                        'formatCode' => "Rp #,##0_-",
                    ]
                ]
            ];

            $sheet->setCellValue('A1', 'Laporan Data ' . $startdate . '/' . $enddate);
            $sheet->setCellValue('A3', 'Nama Item');
            $sheet->setCellValue('B3', 'Kuantity');
            $sheet->setCellValue('C3', 'Harga');
            $totalQty = 0;
            $totalPrice = 0;
            $groupedItems = collect();
            foreach ($transaction as  $value) {
                foreach ($value->transactionDetail as $item) {
                    $productUid = $item->product_uid;
                    if ($groupedItems->has($productUid)) {
                        $existingItem = $groupedItems->get($productUid);
                        $existingItem['qty'] += $item->qty;
                        $existingItem['price'] = $item->price;
                        $groupedItems->put($productUid, $existingItem);
                    }else{
                        $groupedItems->put($productUid, [
                            'product_name' => $item?->product?->name,
                            'qty' => $item->qty,
                            'price' => $item->price,
                        ]);
                    }
                }
            }


            foreach ($groupedItems as $key => $value) {
                $sheet->setCellValue("A$row", $value['product_name']);
                $sheet->setCellValue("B$row", $value['qty']);
                $sheet->setCellValue("C$row", $value['price']);
                $totalQty += $value['qty'];
                $totalPrice += $value['qty'] * $value['price'];
                $row++;
            }
             $sheet->setCellValue("A$row", 'Total');
             $sheet->setCellValue("B$row", $totalQty);
             $sheet->setCellValue("C$row", $totalPrice);
             $sheet->getStyle("A$row:C$row")->applyFromArray($styles['header']);

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getStyle('A1')->applyFromArray($styles['title']);
            $sheet->getStyle('A3:C3')->applyFromArray($styles['header']);
            $sheet->mergeCells('A1:C1');
            $sheet->setAutoFilter("A3:C$row");

            $writer = new Xlsx($spreedsheet);
            $writer->save($filename);
            header('Content-Type: application/octet-stream');
            header("Content-Disposition: attachment; filename=$filename");
            readfile($filename);
            unlink($filename);
        } catch (\Throwable $th) {
            dd($th);
           return back()->with(['alertError' => 'Gagal, Download report']);
        }
    }

    public function history(){
        $transaction = transaction::whereNotIn('status', ['pending'])->get();
        $transactions = $transaction->map(function ($transaction) {
            $totalPrice = $transaction->transactionDetail->sum(function ($detail) {
                return $detail->price * $detail->qty; // Mengalikan harga dengan kuantitas
            });
            $transaction->total_price = $totalPrice;
            return $transaction;
        });

        return $transactions;
    }

}
