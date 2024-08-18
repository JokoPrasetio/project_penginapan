<?php

namespace App\Http\Controllers;

use App\Http\Controllers\helper\helperController;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
      try {
        $validateData = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $image = $validateData['image'];
        $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
        Storage::disk('image')->put($imageName, file_get_contents($image));

        $payload = [
            'uid' => (new helperController)->getUid(),
            'name' => $validateData['name'],
            'category' => $validateData['category'],
            'price' => $validateData['price'],
            'description' => $validateData['description'],
            'image' => $imageName
        ];
        product::create($payload);
        return redirect('/restaurant#restaurant')->with(['alertSuccess' => 'Successfully add product']);
      } catch (\Throwable $th) {
       return back()->with(['alertError' => 'Failed to add product']);
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
    public function update(Request $request, string $uid)
    {
        $product = product::where('uid', $uid)->first();
       try {
        $validateData = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $payload = [
            'name' => $validateData['name'],
            'category' => $validateData['category'],
            'price' => $validateData['price'],
            'description' => $validateData['description'],
        ];

        if(request()->file('image')){
            Storage::disk('image')->delete($product->image);
            $image = request()->file('image');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            Storage::disk('image')->put($imageName, file_get_contents($image));
            $payload['image'] = $imageName;
        }
       $product->update($payload);
        return redirect('/restaurant#restaurant')->with(['alertSuccess' => 'Successfully edit product']);
       } catch (\Throwable $th) {
        return back()->with(['alertError' => 'Failed to edit product']);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid)
    {
      try {
        $product = product::where('uid', $uid)->first();
        $payload = [
            'status' => 'off'
        ];
        $product->update($payload);
        //  Storage::disk('image')->delete($product->image);
        //  $product->delete();
        return back()->with(['alertSuccess' => 'Berhasil hapus item!']);
      } catch (\Throwable $th) {
       return back()->with(['alertError' => 'Gagal hapus item!']);
      }
    }
}
