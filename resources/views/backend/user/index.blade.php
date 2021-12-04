@extends('backend.layout.layout')
@section('title')
    Admin
@endsection
@section('css')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin list</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <section class="content">
      
        <div class="container-fluid">
          @include('backend.layout.alert')
          <div class="row">
            
            <div class="col-12">
              
              <div class="card">
                
                <div class="card-header">
                  
                  <h3 class="card-title">Admin list</h3>
                  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" id="search_title" name="search_title"  class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                    <br>
                    <a href="javascript:void(0)" id="create-new-user" class="btn btn-md bg-gradient-primary" 
                    style="float:right">Add admin</a>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0">
                  
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="data_crud" >
                      @foreach($allData as $singleData)
                      <tr id="table_id_{{ $singleData->id }}" >
                        <td>{{$singleData->id}}</td>
                        <td>{{$singleData->name}}</td>
                        <td>{{$singleData->email}}</td>
                        <td><div class="btn-group">
                            <a href="javascript:void(0)" id="edit-user" data-id="{{ $singleData->id }}" class="btn btn-primary" >
                                Edit
                            </a>
                            <a href="{{route('admin.user.addpermission',$singleData->id)}}" class="btn btn-warning">Permission</a>
                            <a href="javascript:void(0)" id="delete-user" data-id="{{ $singleData->id }}" class="btn btn-danger">
                              Delete
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        
         
        </div><!-- /.container-fluid -->
      </section>
    
    <form id="dataForm" name="dataForm" enctype="multipart/form-data" >	
      <div class="modal fade" id="exampleModalScrollable" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalScrollableTitle" ></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="data_id" id="data_id">
                
                <label>Name: </label>
                <div class="form-group">
                    <input type="text" placeholder="Enter Name" class="form-control"
                     id="name" name="name" required >
                </div>
                <label>Email: </label>
                <div class="form-group">
                    <input type="email" placeholder="Enter Email" class="form-control"
                     id="email" name="email" required >
                </div>
                <label>Phone: </label>
                <div class="form-group">
                    <input type="text" placeholder="Enter Phone" class="form-control"
                     id="phone" name="phone" required >
                </div>
                <label>Password: </label>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password" class="form-control"
                     id="password" name="password" required >
                </div>
                <label>User Status: </label>
								<div class="form-group">
                    <select class="custom-select form-control" id="user_status" data-placeholder="Type to search cities" name="user_status">
                          <option value="0">Inactive</option>
                          <option value="1" selected>Active</option>
                    </select>
								</div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-save" value="create" >Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>

@endsection

@section('js')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
   $('#blog_image').change(function(){
         
           let reader = new FileReader();
           reader.onload = (e) => { 
             $('#image_preview_container').attr('src', e.target.result); 
           }
           reader.readAsDataURL(this.files[0]); 

       });
  
    
  
    /*  When user click add user button */
    $('#create-new-user').click(function () {
        $('#btn-save').val("create-user");
        $('#data_id').val("");
        $('#dataForm').trigger("reset");
        $('#exampleModalScrollableTitle').html("Add New Admin User");
        $('#btn-save').html("Save");
        $('#exampleModalScrollable').modal('show');
        $('#password').attr('required', true);
        $('#email').attr('disabled', false);
        $('#password').attr('disabled', false);
        $('#phone').attr('disabled', false);
        $('#user_status').attr('disabled', false);
        $('#name').attr('disabled', false);
    });
  
   /* When click edit user */
    $('body').on('click', '#edit-user', function () {
      var data_id = $(this).data('id');
          $.get('/admin-dashboard/user-edit/'+ data_id , function (data) {
          $('#exampleModalScrollableTitle').html("Edit Admin User");
          $('#btn-save').html("Update");
          $('#btn-save').val("edit-user");
          $('#exampleModalScrollable').modal('show');
          $('#data_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#phone').val(data.phone);
          $('#user_status').val(data.user_status);
      $('#password').attr('required', false);
          if(data_id <= 1)
      {
       $('#btn-save').attr('disabled', true);
       $('#name').attr('disabled', true);
             $('#email').attr('disabled', true);
             $('#password').attr('disabled', true);
             $('#phone').attr('disabled', true);
             $('#user_status').attr('disabled', true);
      }
      else
      {
        
       $('#btn-save').attr('disabled', false);
       $('#name').attr('disabled', false);
             $('#email').attr('disabled', false);
             $('#password').attr('disabled', false);
             $('#phone').attr('disabled', false);
             $('#user_status').attr('disabled', false);			  
      }
         
      })
   });
 
 


 
 
   //delete user login
    $('body').on('click', '#delete-user', function () {
        var data_id = $(this).data("id");
if( data_id <= 1 ){

Swal.fire({
   title: 'Error!',
   text: 'This User Cannot Be Deleted',
   icon: 'warning',
   customClass: {
     confirmButton: 'btn btn-primary'
   },
   buttonsStyling: false
 });
 

 
}
else{
 
 Swal.fire({
   title: 'Are you sure?',
   text: "You won't be able to revert this!",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonText: 'Yes, delete it!',
   customClass: {
     confirmButton: 'btn btn-primary',
     cancelButton: 'btn btn-outline-danger ml-1'
   },
   buttonsStyling: false
 }).then(function(result) {
   if (result.value) {
     
        $.ajax({
            type: "DELETE",
            url: "{{ url('/admin-dashboard/user-delete')}}"+'/'+data_id,
            success: function (data) {
                $("#table_id_" + data_id).remove();

 Swal.fire({
   title: 'Success!',
   text: 'You Data Deleted Successfully!',
   icon: 'success',
   customClass: {
     confirmButton: 'btn btn-primary'
   },
   buttonsStyling: false
 });				 
        
            },
            error: function (data) {
                console.log('Error:', data);
            }
        }); 	  
   

   } else if (result.dismiss === Swal.DismissReason.cancel) {
     
 Swal.fire({
   title: 'Cancel!',
   text: ' Your Data Safe!',
   icon: 'error',
   customClass: {
     confirmButton: 'btn btn-primary'
   },
   buttonsStyling: false
 });
   
   }
 });
 
 
 }

    

    }); 


  
  });
 


            $('#dataForm').on('submit', function(event){
               event.preventDefault();
               var id  = $('#table_id_').val();
               if(id){
                   var method = 'update';
                   var url    = "{{route('admin.user.store')}}";
               }else{
                   var method = 'add';
                   var url    = "{{route('admin.user.store')}}";
               }

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
       
     var actionType = $('#btn-save').val();
           $('#btn-save').html('Sending..');
    
               $.ajax({
                   url:url,
                   type: "POST",
                   data: new FormData(this),
                   dataType: "JSON",
                   contentType:false,
                   cache:false,
                   processData:false,

          success: function (data) {
             
        var datavalue = '<tr id="table_id_' 
        + data.id + '"><td >' 
        + data.id + '</td><td>' 
        + data.name + '</td><td>' 
        + data.email + '</td>';
        
        datavalue += '<td><div class="btn-group" role="group" aria-label="Basic example">';
        
        datavalue += ' <a href="javascript:void(0)" id="edit-user" data-id="' 
        + data.id + '" class="btn btn-primary waves-effect waves-float waves-light">Edit</a>';
        
        datavalue += ' <a href="/admin-dashboard/admin-addpermission/' 
        + data.id + '" class="btn btn-warning waves-effect waves-float waves-light">Permission</a>';
        
              datavalue += '<a href="javascript:void(0)" id="delete-user" data-id="' 
        + data.id + '" class="btn btn-danger waves-effect waves-float waves-light" >Delete</a>';
        
        datavalue += '</div></td></tr>';
               
              
              if (actionType == "create-user") {
                  $('#data_crud').prepend(datavalue);
              } else {
                  $("#table_id_" + data.id).replaceWith(datavalue);
              }
       
       
              $('#dataForm').trigger("reset");
              $('#exampleModalScrollable').modal('hide');
              $('#btn-save').html('Save Changes');
              $('#btn-save').html('Save');
 Swal.fire({
   title: 'Success!',
   text: 'Your Data Saved Successfully!',
   icon: 'success',
   customClass: {
     confirmButton: 'btn btn-primary'
   },
   buttonsStyling: false
 });

          },
          error: function (data) {
        console.log('Error:', data);
              $('#btn-save').html('Save');
              $('#dataForm').trigger("reset");
              $('#exampleModalScrollable').modal('hide');

Swal.fire({
   title: 'Error!',
   text: 'Email Already exist',
   icon: 'error',
   customClass: {
     confirmButton: 'btn btn-primary'
   },
   buttonsStyling: false
 });

          }

               });

           });

 
    $('#search_title').keyup(function(){ 
       var query = $(this).val();
       var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('admin.user.search') }}",
         method:"POST",
         data:{query:query, _token:_token},
         success:function(data){
          $('#data_crud').html(data);
         }
        });
      
   });   

  
</script>
@endsection