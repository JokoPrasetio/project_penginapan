@if(session()->has('alertError'))
<div class="alert alert-danger alert-dismissible" role="alert" style="font-size: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Gagal!</strong>  {{ session('alertError')}}.
  </div>
@endif

@if(session()->has('alertSuccess'))
  <div class="alert alert-success alert-dismissible" role="alert" style="font-size: 15px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Success!</strong> {{ session('alertSuccess')}}.
  </div>
@endif
