<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Customer;

class CustomerController extends Controller
{
 
    public function index()
    {
		$this->checkpermission(2);
        $allData=Customer::latest()->get();
		return view('backend.customer.index',compact('allData'));
    }

    public function create()
    {
        //
    }
	
	public function search(Request $request)
	{
		$query = $request->get('query');
		$allData = Customer::
          where('customer_name', 'LIKE', "%{$query}%")
        ->latest()->get();			
		
		return view('backend.customer.search',compact('allData'));	
	}	

    public function store(Request $request)
    {
		if($request->data_id == null)
		{  
        $data = new Customer();
        $data ->customer_name = $request->customer_name;
        $data ->customer_phone = $request->customer_phone;
        $data ->customer_address = $request->customer_address;
        $data ->customer_status = $request->customer_status;
        $data ->password =  bcrypt($request->password);
        $save = $data->save();

		}
		else
		{
        $data = Customer::find($request->data_id);
        $data ->customer_name = $request->customer_name;
        $data ->customer_phone = $request->customer_phone;
        $data ->customer_address = $request->customer_address;
        $data ->customer_status = $request->customer_status;
        if($request->password != null)
        {
            $data ->password =  bcrypt($request->password);
        }
        $save = $data->update();
        
		}
		return Response::json($data);
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
	    $singleData=Customer::find($id);
		return Response::json($singleData);
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        $findiT=Customer::findOrFail($id);
		$data=$findiT->delete();
        return Response::json($data);
    }   


}
