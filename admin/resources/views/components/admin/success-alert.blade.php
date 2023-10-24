@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade alertMessage show" role="alert">
    <strong><i class="icon fa fa-check"></i> Alert!</strong> {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif