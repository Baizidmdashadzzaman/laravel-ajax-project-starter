<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Models\Category;
class CategoryController extends Controller
{

  
    public function index()
    {
		$this->checkpermission(3);
        $allData=Category::latest()->get();
		return view('backend.category.index',compact('allData'));
    }

    public function create()
    {
        //
    }
	
	public function search(Request $request)
	{
		$query = $request->get('query');
		$allData = Category::
          where('category_name', 'LIKE', "%{$query}%")
        ->latest()->get();			
		
		return view('backend.category.search',compact('allData'));	
	}	

    public function store(Request $request)
    {
		if($request->data_id == null)
		{  
        $data = new Category();
        $data ->category_name = $request->category_name;
        $data ->category_code = $request->category_code;
        $data ->category_image = time(). $_FILES["category_image"]["name"];
        $data ->category_banner = time(). $_FILES["category_banner"]["name"];
        $data ->category_slug = $request->category_slug;
        $data ->category_description = $request->category_description;
        $data ->status = $request->status;
        $save = $data->save();

        $source= $_FILES['category_image']['tmp_name'];
        @mkdir("CategoryFolder");
        $destination="CategoryFolder/".$data->category_image;
        $saveimage = move_uploaded_file($source,$destination);        
		
		$source= $_FILES['category_banner']['tmp_name'];
        @mkdir("CategoryFolder");
        $destination="CategoryFolder/".$data->category_banner;
        $saveimage = move_uploaded_file($source,$destination);
		
		}
		else
		{
        $data = Category::find($request->data_id);
        $data ->category_name = $request->category_name;
        $data ->category_code = $request->category_code;
		if($request->category_image != null)
		{
        $data ->category_image = time(). $_FILES["category_image"]["name"];
		}
		if($request->category_banner != null)
		{
        $data ->category_banner = time(). $_FILES["category_banner"]["name"];
		}
        $data ->category_slug = $request->category_slug;
        $data ->category_description = $request->category_description;
        $data ->status = $request->status;
        $save = $data->update();
		if($request->category_image != null)
		{
        $source= $_FILES['category_image']['tmp_name'];
        @mkdir("CategoryFolder");
        $destination="CategoryFolder/".$data->category_image;
        $saveimage = move_uploaded_file($source,$destination);        
		}
		if($request->category_banner != null)
		{		
		$source= $_FILES['category_banner']['tmp_name'];
        @mkdir("CategoryFolder");
        $destination="CategoryFolder/".$data->category_banner;
        $saveimage = move_uploaded_file($source,$destination);
		}
		}
		return Response::json($data);
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
	    $singleData=Category::find($id);
		return Response::json($singleData);
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        $findiT=Category::findOrFail($id);
		$data=$findiT->delete();
        return Response::json($data);
    }
	
	  


}
