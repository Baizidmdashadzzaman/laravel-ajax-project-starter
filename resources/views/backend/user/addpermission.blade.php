@extends('backend.layout.layout')

@section('title')
     Admin Permission
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('resources')}}/plugins/toastr/toastr.min.css">
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
              <li class="breadcrumb-item ">Admin</li>
              <li class="breadcrumb-item active">Admin permission</li>
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
                  
                  <h3 class="card-title">Admin permission : {{$allData2->name}}</h3>
                  
                  
                </div>
                <!-- /.card-header -->
                @php
					$permission = explode(',', $allData2->user_permission);
				@endphp
                <div class="card-body table-responsive p-0">
                  
                    <table class="table table-striped table-borderless">
                        <thead class="thead-light">
                            <tr>
                                <th>Module</th>
                                <th>Read</th>
                                <th>Write</th>
                                <th>Create</th>
                                <th>Delete</th>
                                <th>Permission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Admin management</td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="admin-read" checked="" disabled="">
                                        <label class="custom-control-label" for="admin-read"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="admin-write" checked="" disabled="">
                                        <label class="custom-control-label" for="admin-write"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="admin-create" checked="" disabled="">
                                        <label class="custom-control-label" for="admin-create"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="admin-delete" checked="" disabled="">
                                        <label class="custom-control-label" for="admin-delete"></label>
                                    </div>
                                </td>
                                <td>
                                  @if(in_array(1, $permission))
                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                
                                     <input type="checkbox" data-id="1" class="checkModule custom-control-input" name="userPermission"  id="customSwitch11" checked>
                                     <label class="custom-control-label" for="customSwitch11">
                                          <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                         <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                     </label>
                                    </div>
                                    @else
                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                
                                     <input type="checkbox" data-id="1" class="checkModule custom-control-input" name="userPermission"  id="customSwitch11">
                                     <label class="custom-control-label" for="customSwitch11">
                                          <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                         <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                     </label>
                                    </div>
                                    @endif	
                                </td>
                            </tr>

                            <tr>
                              <td>User Management</td>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-read" checked="" disabled="">
                                      <label class="custom-control-label" for="admin-read"></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-write" checked="" disabled="">
                                      <label class="custom-control-label" for="admin-write"></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-create" checked="" disabled="">
                                      <label class="custom-control-label" for="admin-create"></label>
                                  </div>
                              </td>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="admin-delete" checked="" disabled="">
                                      <label class="custom-control-label" for="admin-delete"></label>
                                  </div>
                              </td>
                              <td>
                                @if(in_array(2, $permission))
                                  <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                              
                                   <input type="checkbox" data-id="2" class="checkModule custom-control-input" name="userPermission" 
                                    id="customSwitch12" checked>
                                   <label class="custom-control-label" for="customSwitch12">
                                        <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                       <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                   </label>
                                  </div>
                                  @else
                                  <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                              
                                   <input type="checkbox" data-id="2" class="checkModule custom-control-input" 
                                   name="userPermission"  id="customSwitch12">
                                   <label class="custom-control-label" for="customSwitch12">
                                        <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                       <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                   </label>
                                  </div>
                                  @endif	
                              </td>
                          </tr>

                          <tr>
                            <td>Category Management</td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="admin-read" checked="" disabled="">
                                    <label class="custom-control-label" for="admin-read"></label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="admin-write" checked="" disabled="">
                                    <label class="custom-control-label" for="admin-write"></label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="admin-create" checked="" disabled="">
                                    <label class="custom-control-label" for="admin-create"></label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="admin-delete" checked="" disabled="">
                                    <label class="custom-control-label" for="admin-delete"></label>
                                </div>
                            </td>
                            <td>
                              @if(in_array(3, $permission))
                                <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                            
                                 <input type="checkbox" data-id="3" class="checkModule custom-control-input"
                                  name="userPermission" 
                                  id="customSwitch13" checked>
                                 <label class="custom-control-label" for="customSwitch13">
                                      <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                     <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                 </label>
                                </div>
                                @else
                                <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                            
                                 <input type="checkbox" data-id="3" class="checkModule custom-control-input" 
                                 name="userPermission"  id="customSwitch13">
                                 <label class="custom-control-label" for="customSwitch13">
                                      <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                     <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                 </label>
                                </div>
                                @endif	
                            </td>
                        </tr>

                        <tr>
                          <td>System Management</td>
                          <td>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="admin-read" checked="" disabled="">
                                  <label class="custom-control-label" for="admin-read"></label>
                              </div>
                          </td>
                          <td>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="admin-write" checked="" disabled="">
                                  <label class="custom-control-label" for="admin-write"></label>
                              </div>
                          </td>
                          <td>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="admin-create" checked="" disabled="">
                                  <label class="custom-control-label" for="admin-create"></label>
                              </div>
                          </td>
                          <td>
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="admin-delete" checked="" disabled="">
                                  <label class="custom-control-label" for="admin-delete"></label>
                              </div>
                          </td>
                          <td>
                            @if(in_array(4, $permission))
                              <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                          
                               <input type="checkbox" data-id="4" class="checkModule custom-control-input"
                                name="userPermission" 
                                id="customSwitch14" checked>
                               <label class="custom-control-label" for="customSwitch14">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                   <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                               </label>
                              </div>
                              @else
                              <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                          
                               <input type="checkbox" data-id="4" class="checkModule custom-control-input" 
                               name="userPermission"  id="customSwitch14">
                               <label class="custom-control-label" for="customSwitch14">
                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                   <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                               </label>
                              </div>
                              @endif	
                          </td>
                      </tr>


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



@endsection


@section('js')
<script src="{{asset('resources')}}/plugins/toastr/toastr.min.js"></script>
<script>
    
   $(document).ready(function () {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
	 
	 
	 $('body').on('click', '.checkModule', function () {
         var data_id = $(this).data('id');
         var role_id = {{$allData2->id}};
	     var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('admin.user.savepermissin') }}",
          method:"POST",
          data:{data_id:data_id,role_id:role_id, _token:_token},
          success:function(data){
		   if(data == "added")  
		   {
		      toastr.success('Successfully Permission Added For User', 'Permission Added');
		   }
		   else
		   {
			  toastr.info('Successfully Permission Removed For User', 'Permission Removed');
		   }
          }
         });
          
    }); 
	 

   });
  
</script>


@endsection