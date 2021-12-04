<?php

namespace App\Http\Controllers\customer;
use App\Http\Controllers\Controller;
use App\Models\CustomerUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Redirect,Response;
class CustomersUserController extends Controller
{
    public function index()
    {
		//$this->checkpermission(2);
        $allData=CustomerUser::where('customer_id',Auth::user()->id)->latest()->get();
		return view('customer.customer.index',compact('allData'));
    }

    public function create()
    {
        //
    }
	
	public function search(Request $request)
	{
		$query = $request->get('query');
		$allData = CustomerUser::
          where('customer_id',Auth::user()->id)
        ->where('customer_users_name', 'LIKE', "%{$query}%")
        ->latest()->get();			
		
		return view('customer.customer.search',compact('allData'));	
	}	

    public function store(Request $request)
    {
		if($request->data_id == null)
		{  
        $data = new CustomerUser();
        $data ->customer_id = Auth::user()->id;
        $data ->customer_users_name = $request->customer_users_name;
        $data ->customer_users_phone = $request->customer_users_phone;
        $data ->customer_users_address = $request->customer_users_address;
        $data ->customer_users_permission = $request->customer_users_permission;
        $data ->customer_users_status = $request->customer_users_status;
        $data ->password =  bcrypt($request->password);
        $save = $data->save();

		}
		else
		{
        $data = CustomerUser::find($request->data_id);
        $data ->customer_users_name = $request->customer_users_name;
        $data ->customer_users_phone = $request->customer_users_phone;
        $data ->customer_users_address = $request->customer_users_address;
        $data ->customer_users_permission = $request->customer_users_permission;
        $data ->customer_users_status = $request->customer_users_status;
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
	    $singleData=CustomerUser::find($id);
		return Response::json($singleData);
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        $findiT=CustomerUser::findOrFail($id);
		$data=$findiT->delete();
        return Response::json($data);
    }   

}
