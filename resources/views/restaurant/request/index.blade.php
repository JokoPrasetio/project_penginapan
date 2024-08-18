@extends('partials.content_auth')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@section('body_content_auth')
<section class="section-account parallax bg-11">
    <div class="awe-overlay"></div>
    <div class="container">
    <div class="login-register">
            <div class="text text-center" >
                <h2>Request Order</h2>
                @include('partials.alert')
                <div class="" style="background-color: white; margin-top:20px;">

                <button type="button" class="btn btn-primary" onclick="reportDownload()" style="font-size: 1.3rem; margin-bottom:2rem; margin-top:1rem;">Report</button>
                <button type="button" class="btn btn-success" onclick="historyApproval()" style="font-size: 1.3rem; margin-bottom:2rem; margin-top:1rem;">History</button>
                <div class="table-responsive" >
                    <table id="orders-table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Ruangan</th>
                                <th>No.Whatsapp</th>
                                <th>Total Harga</th>
                                <th>Tanggal Order</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $key => $item)
                            <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $item['name']}}</td>
                                <td>{{ $item['name_room']}}</td>
                                <td>{{ $item['no_wa']}}</td>
                                <td>{{ number_format($item['total_price'], 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y, H:i') }}</td>
                                <td><del><button class="btn btn-primary" style="margin-right: 0.5rem;" onclick="detailOrder('{{ $item['uid'] }}')"><i class="fa-solid fa-circle-info"></i></button></del></td>
                                <td> <del><button class="btn btn-success" style="margin-right: 0.5rem;" onclick="ApprovedOrder('{{ $item['uid'] }}', '{{ $item['name'] }}', '{{ $item['name_room']}}')"><i class="fa-solid fa-circle-check"></i></button></del>
                                    <del><button class="btn btn-danger" type="button"  onclick="rejectOrder('{{ $item['uid'] }}', '{{ $item['name'] }}', '{{ $item['name_room'] }}')"><i class="fa-solid fa-square-xmark"></i></button></del>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                  </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('restaurant.request.modal.approve')
@include('restaurant.request.modal.reject')
@include('restaurant.request.modal.detail')
@include('restaurant.request.modal.report')
@include('restaurant.request.modal.history')


<script src="/js/request/action.js"></script>
@endsection
