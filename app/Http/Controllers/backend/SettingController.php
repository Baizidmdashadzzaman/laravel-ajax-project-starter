<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;

class SettingController extends Controller
{

    public function index()
    {
		$this->checkpermission(4);
		$allData=Setting::first();
        if($allData == null)
        {
           $data = new Setting();
           $data ->site_name = "Demo";
           $data ->site_url = "Demo";
		   $data ->website_logo = "Demo";
		   $data ->website_fabicon = "Demo";
		   $data ->website_mobilenumber = "Demo";
		   $data ->website_email = "Demo";
		   $data ->website_address = "Demo";
		   $data ->fb_link = "Demo";
		   $data ->twitter_link = "Demo";
		   $data ->linkdin_link = "Demo";
		   $data ->insta_link = "Demo";
		   $data ->pintest_link = "Demo";
		   $data ->whatsapp_number = "Demo";
		   $data ->website_keywords = "Demo";
		   $data ->website_descriptions = "Demo";
           $save = $data->save();
        }
        $allData=Setting::first();
        return view('backend.setting.index',compact('allData'));
    }


    public function store(Request $request)
    {
        $data = Setting::first();
        $data ->site_name = $request->site_name;
        $data ->site_url = $request->site_url;
		
		if($request->website_logo != null)
		{
           $data ->website_logo = time(). $_FILES["website_logo"]["name"];
		}		
		
		if($request->website_fabicon != null)
		{
           $data ->website_fabicon = time(). $_FILES["website_fabicon"]["name"];
		}		
		
		$data ->website_mobilenumber = $request->website_mobilenumber;
		$data ->website_email = $request->website_email;
		$data ->website_address = $request->website_address;
		$data ->fb_link = $request->fb_link;
		$data ->twitter_link = $request->twitter_link;
		$data ->linkdin_link = $request->linkdin_link;
		$data ->insta_link = $request->insta_link;
		$data ->pintest_link = $request->pintest_link;
		$data ->whatsapp_number = $request->whatsapp_number;
		$data ->website_keywords = $request->website_keywords;
		$data ->website_descriptions = $request->website_descriptions;
        
        $save = $data->update();

        if($request->website_logo != null)
		{
           $source= $_FILES['website_logo']['tmp_name'];
           @mkdir("SettingLogoFolder");
           $destination="SettingLogoFolder/".$data->website_logo;
           $saveimage = move_uploaded_file($source,$destination);        
		}        
		
		if($request->website_fabicon != null)
		{
           $source= $_FILES['website_fabicon']['tmp_name'];
           @mkdir("SettingFabiconFolder");
           $destination="SettingFabiconFolder/".$data->website_fabicon;
           $saveimage = move_uploaded_file($source,$destination);        
		}		
		
		
		

        return Response::json($data);
    }    


}
