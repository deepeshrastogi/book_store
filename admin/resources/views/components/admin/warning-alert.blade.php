@if(Session::has('warning'))
<div class="alert alert-danger alert-dismissible alertMessage fade show" role="alert">
    <strong><i class="icon fa fa-ban"></i> Alert!</strong> {{ Session::get('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif