@extends('backend.layout.layout')

@section('title')
     Category
@endsection

@section('css')

@endsection



@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category list</li>
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
                  
                  <h3 class="card-title">Category list</h3>
                  
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
                    style="float:right">Add category</a>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0">
                  
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="data_crud" >
                      @foreach($allData as $singleData)
                      <tr id="table_id_{{ $singleData->id }}" >
                        <td>{{$singleData->id}}</td>
                        <td><img src="{{asset('CategoryFolder/'.$singleData->category_image)}}" style="width:100px"></td>
                        <td>{{$singleData->category_name}}</td>
                        
                        <td><div class="btn-group">
                            <a href="javascript:void(0)" id="edit-user" data-id="{{ $singleData->id }}" class="btn btn-primary" >
                                Edit
                            </a>
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
                
                <label>Category Name: </label>
                <div class="form-group">
                        <input type="text" placeholder="Enter Category Name" class="form-control" id="category_name" name="category_name" required >
                </div>
                
                <label>Category Slug: </label>
                <div class="form-group">
                        <input type="text" placeholder="Enter Category Slug" class="form-control" id="category_slug" name="category_slug" readonly >
                </div>
                
                
                <label>Category Code: </label>
                <div class="form-group">
                        <input type="text" placeholder="Enter Category Code" class="form-control" id="category_code" name="category_code" readonly >
                </div>
                
                <label>Category Image: </label>
                <div class="form-group">
                <center>
                <img id="image_preview_container" src="{{asset('asadImage/image-preview.png')}}"
                     alt="preview image" style="max-height: 150px;">
                 </center>
                        <input type="file" placeholder="Enter Image" class="form-control" id="category_image" name="category_image" required >
                </div>
                
                <label>Category Banner: </label>
                <div class="form-group">
                <center>
                <img id="image_preview_container2" src="{{asset('asadImage/image-preview.png')}}"
                     alt="preview image" style="max-height: 150px;">
                 </center>
                        <input type="file" placeholder="Enter Banner" class="form-control" id="category_banner" name="category_banner" required >
                </div>
                
                <label>Description: </label>
                <div class="form-group">
                        <textarea  placeholder="Enter Description" class="form-control" id="category_description" name="category_description" ></textarea>
                </div>
                
                <label>Status: </label>
                <div class="form-group">
                      <select class="custom-select form-control" id="status" data-placeholder="Type to search cities" name="status">
                         <option value="0">Inactive</option>
                         <option value="1" selected>Active</option>
                      </select>
                </div>
               

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-save" value="create" >Save</button>
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
	 
	    $('#category_name').keyup(function(){
          
            var Text = $('#category_name').val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $('#category_slug').val(Text);
 
        });		    
		
		$('#category_image').change(function(){
          
            let reader = new FileReader();
            reader.onload = (e) => { 
              $('#image_preview_container').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
 
        });	  
		
		$('#category_banner').change(function(){
          
            let reader = new FileReader();
            reader.onload = (e) => { 
              $('#image_preview_container2').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
 
        });
	 
	   
	 
     /*  When user click add user button */
     $('#create-new-user').click(function () {
         $('#btn-save').val("create-user");
		 $('#data_id').val("");
         $('#dataForm').trigger("reset");
         $('#exampleModalScrollableTitle').html("Add New Category");
         $('#btn-save').html("Save");
         $('#exampleModalScrollable').modal('show');
		 $('#category_image').attr('required', true);
		 $('#image_preview_container').attr('src', '/asadImage/image-preview.png');
		 $('#image_preview_container2').attr('src', '/asadImage/image-preview.png');
		 //var d = new Date();
         //var n = d.getTime();
		 var num=Math.floor(Math.random() * 1000000000000000000);
		 $('#category_code').val(num);
     });
   
    /* When click edit user */
     $('body').on('click', '#edit-user', function () {
       var data_id = $(this).data('id');
           $.get('/admin-dashboard/category-edit/'+ data_id , function (data) {
           $('#exampleModalScrollableTitle').html("Edit Category Information");
		   $('#btn-save').html("Update");
           $('#btn-save').val("edit-user");
           $('#exampleModalScrollable').modal('show');
           $('#data_id').val(data.id);
           $('#category_name').val(data.category_name);
           $('#category_code').val(data.category_code);
           $('#category_image').attr('required', false);
		   $('#image_preview_container').attr('src', '/CategoryFolder/'+data.category_image);
           $('#category_image').val("");
		   $('#category_banner').attr('required', false);
		   $('#image_preview_container2').attr('src', '/CategoryFolder/'+data.category_banner);
           $('#category_banner').val("");
		   $('#category_namebn').val(data.category_namebn);
		   $('#category_slug').val(data.category_slug);
		   $('#category_description').val(data.category_description);
		   $('#category_descriptionbn').val(data.category_descriptionbn);
		   $('#status').val(data.status);

          
       })
    });
	
	


	
	
    //delete user login
     $('body').on('click', '#delete-user', function () {
         var data_id = $(this).data("id");

	
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
             url: "{{ url('/admin-dashboard/category-delete')}}"+'/'+data_id,
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
	
	
	 

     }); 


	 
   });
  


             $('#dataForm').on('submit', function(event){
                event.preventDefault();
                var id  = $('#table_id_').val();
                if(id){
                    var method = 'update';
                    var url    = "{{route('admin.category.store')}}";
                }else{
                    var method = 'add';
                    var url    = "{{route('admin.category.store')}}";
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
				var host = "{{request()->getHttpHost()}}";
				
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
			   + data.id + '</td><td><img src="http://'+host+'/CategoryFolder/' 
			   + data.category_image + '"alt="image" style="width:100px;"></td><td>'
			   + data.category_name + '</td>';
			   
			   datavalue += '<td><div class="btn-group" role="group" aria-label="Basic example">';
			   
			   datavalue += ' <a href="javascript:void(0)" id="edit-user" data-id="' 
			   + data.id + '" class="btn btn-primary waves-effect waves-float waves-light">Edit</a>';
			   
			   
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
               $('#btn-save').html('Save Changes');
           }

                });

            });

  
   	$('#search_title').keyup(function(){ 
        var query = $(this).val();
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('admin.category.search') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#data_crud').html(data);
          }
         });
       
    });   

   
</script>


@endsection