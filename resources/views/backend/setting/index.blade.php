@extends('backend.layout.layout')

@section('title')
     System Setting
@endsection

@section('css')
@endsection



@section('content')

<div class="content-wrapper" style="padding: 20px">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">System Setting</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">System Setting</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
			
			<section id="lastcreateddata">
                  
            </section>
			
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">System Setting</h4>
                                </div>
                                <div class="card-body">
                                    <form id="dataForm" name="dataForm" enctype="multipart/form-data"  class="form form-horizontal">
                                        <div class="row">
                                            
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Site Name</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="site_name" class="form-control" name="site_name" value="{{$allData->site_name}}" placeholder="Enter Site Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Site Url</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="site_url" class="form-control" name="site_url" value="{{$allData->site_url}}" placeholder="Enter Site Name (Bn)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Site Logo</label>
                                                    </div>
                                                    <div class="col-sm-8">
													     <img src="{{asset('SettingLogoFolder/'.$allData->website_logo)}}" style="width:200px" id="website_logo_pre" >
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="file" id="website_logo" class="form-control" name="website_logo" value="{{$allData->website_logo}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>	
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Site Fabicon</label>
                                                    </div>
                                                    <div class="col-sm-8">
													     <img src="{{asset('SettingFabiconFolder/'.$allData->website_fabicon)}}" style="width:200px" id="website_fabicon_pre" >
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="file" id="website_fabicon" class="form-control" name="website_fabicon" value="{{$allData->website_fabicon}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
																						
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Phone Number</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="website_mobilenumber" class="form-control" name="website_mobilenumber" value="{{$allData->website_mobilenumber}}" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>	
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Email Address</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="email" id="website_email" class="form-control" name="website_email" value="{{$allData->website_email}}" placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Address</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <textarea  id="website_address" class="form-control" name="website_address"  placeholder="Enter Address">{{$allData->website_address}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>		
											
																					

											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Facebook Link</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="fb_link" class="form-control" name="fb_link" value="{{$allData->fb_link}}" placeholder="Enter Facebook Link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Twitter Link</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="twitter_link" class="form-control" name="twitter_link" value="{{$allData->twitter_link}}" placeholder="Enter Twitter Link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Linkdin Link</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="linkdin_link" class="form-control" name="linkdin_link" value="{{$allData->linkdin_link}}" placeholder="Enter Linkdin Link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Instagram Link</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="insta_link" class="form-control" name="insta_link" value="{{$allData->insta_link}}" placeholder="Enter Insta Link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Pintrest Link</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="pintest_link" class="form-control" name="pintest_link" value="{{$allData->pintest_link}}" placeholder="Enter Pintest Link">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Whatsapp Number</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <input type="text" id="whatsapp_number" class="form-control" name="whatsapp_number" value="{{$allData->whatsapp_number}}" placeholder="Enter Whatsapp Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
											                                
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Website Keywords(Seo)</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <textarea  id="website_keywords" class="form-control" name="website_keywords"  placeholder="Enter Website Keywords">{{$allData->website_keywords}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>												
											
											<div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-4 col-form-label">
                                                        <label for="fname-icon">Website Description(Seo)</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
																<i data-feather='file-text'></i>
																</span>
                                                            </div>
                                                            <textarea  id="website_descriptions" class="form-control" name="website_descriptions"  placeholder="Enter Website Description">{{$allData->website_descriptions}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>	
											
                                            <div class="col-sm-8 offset-sm-4">
											    <br/><br/>
                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light" id="btn-save" value="create" >Update</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
												<br/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Horizontal form layout section end -->
                <br/><br/>
                <br/><br/>
                
            </div>
        </div>
 

@endsection


@section('js')

<script>
   $(document).ready(function () {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
	 
	        $('#website_logo').change(function(){



                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#website_logo_pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });	  	        
			
			$('#website_fabicon').change(function(){



                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#website_fabicon_pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });	   	
			
			$('#website_promotion_banner').change(function(){



                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#website_promotion_banner_pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });
			
			$('#aboutus_page_banner').change(function(){



                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#aboutus_page_banner_pre').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);

            });	        
			

			
	
	
 });
  


             $('#dataForm').on('submit', function(event){
                event.preventDefault();
                    var method = 'update';
                    var url    = "{{route('admin.system.setting.update')}}";
               

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
				
			var actionType = $('#btn-save').val();
            $('#btn-save').html('Updating..');
	   
                $.ajax({
                    url:url,
                    type: "POST",
                    data: new FormData(this),
                    dataType: "JSON",
                    contentType:false,
                    cache:false,
                    processData:false,

           success: function (data) {
              
			   $('#lastcreateddata').empty();
			   
			   var datavalue = '<section id="basic-alerts"><div class="row"><div class="col-xl-12 col-lg-12"><div class="card"><div class="card-body"><p class="card-text"></p><div class="demo-spacing-0"><div class="alert alert-success" role="alert"><div class="alert-body"><strong>Success! </strong> Setting Updated Successfully.</div></div></div></div></div></div></div></section>';
               
			   $('#lastcreateddata').append(datavalue);
			  
               $('#site_name').val(data.site_name);
               $('#site_url').val(data.site_url);
               $('#website_logo').val('');
               $('#website_logo_pre').attr('src', '/SettingLogoFolder/'+data.website_logo);               
			   $('#website_fabicon').val('');
               $('#website_fabicon_pre').attr('src', '/SettingFabiconFolder/'+data.website_fabicon);			   
			   $('#website_mobilenumber').val(data.website_mobilenumber);
               $('#website_email').val(data.website_email);
               $('#website_address').val(data.website_address);
               $('#fb_link').val(data.fb_link);
			   $('#twitter_link').val(data.twitter_link);
			   $('#linkdin_link').val(data.linkdin_link);
			   $('#insta_link').val(data.insta_link);
			   $('#pintest_link').val(data.pintest_link);
			   $('#whatsapp_number').val(data.whatsapp_number);
			   $('#website_keywords').val(data.website_keywords);
			   $('#website_descriptions').val(data.website_descriptions);
               $('#btn-save').html('Save Changes');
			   $('#btn-save').html('Update');
                
 Swal.fire({
    position: 'top-end',
    icon: 'success',
	title: 'Updated!',
    text: 'Your Data Saved Successfully!',
    showConfirmButton: false,
    timer: 1500,
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
				

           },
           error: function (data) {
			   console.log('Error:', data);
               $('#btn-save').html('Unable To Update');
           }

                });

            });


   
</script>


@endsection