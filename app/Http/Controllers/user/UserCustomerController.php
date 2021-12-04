<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerUser;
use Redirect,Response;
class UserCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function dashboard()
	{
		return view('user.dashboard.dashboard');
	}	

     public function login()
	{
        if(Auth::guard('customeruser')->user() == null)
        {
            return view('user.auth.login');
            
        }
        else
        {
            return redirect()->route('customerusers.dashboard')->with('success_message', 'You are already loged In');
        }
		
	}

    public function try_login(Request $request)
    {
        
        $this->validate($request, [
            'customer_users_phone' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('customeruser')->attempt(['customer_users_phone' => $request->customer_users_phone, 'password' => $request->password])) {
            Auth::guard('customeruser')->user()->save();
            return redirect()->route('customerusers.dashboard')->with('success_message', 'You are success fully loged In');
        } else {
            return redirect()->route('customerusers.login')->with('error_message', 'Invalid Username or Password');
        }
        
    }


	
    public function change_password()
	{
		return view('user.user.auth.changepassword');
	}
	
	public function change_password_try(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);
		       
	    if($request->new_password != $request->confirm_password){
            return redirect()->back()->with('error_message', 'Password Not Matched,Please Try Again');
        }
        $user = CustomerUser::find(Auth::user()->id);
		
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
			
			$user->update();
			
            return redirect()->route('customerusers.dashboard')->with('success_message', 'Successfully Changed Your Password');

        } else {
            return redirect()->back()->with('error_message', 'Your Old Password is Wrong');
        }
	}
	
	public function logout()
    {
        Auth::guard('customeruser')->logout();
        Session::flash('success_message', 'Successfully Loged Out');
        return redirect()->route('customerusers.login');

    }

}
