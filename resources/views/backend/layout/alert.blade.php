@if(Session::has('error_message'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-ban"></i> Error!</h5>
  {{ Session::get('error_message') }}
</div>
@endif
@if(Session::has('success_message'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> Success!</h5>
  {{ Session::get('success_message') }}
</div>
@endif