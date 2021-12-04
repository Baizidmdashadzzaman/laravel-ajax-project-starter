<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Redirect,Response;
class CustomeruserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function dashboard()
	{
		return view('users.dashboard.dashboard');
	}	

     public function login()
	{
        if(Auth::guard('customer')->user() == null)
        {
            return view('users.auth.login');
            
        }
        else
        {
            return redirect()->route('customer.dashboard')->with('success_message', 'You are already loged In');
        }
		
	}

    public function try_login(Request $request)
    {
        
        $this->validate($request, [
            'customer_phone' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('customer')->attempt(['customer_phone' => $request->customer_phone, 'password' => $request->password])) {
            Auth::guard('customer')->user()->save();
            return redirect()->route('customer.dashboard')->with('success_message', 'You are success fully loged In');
        } else {
            return redirect()->route('customer.login')->with('error_message', 'Invalid Username or Password');
        }
        
    }


	
    public function change_password()
	{
		return view('users.user.auth.changepassword');
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
        $user = Customer::find(Auth::user()->id);
		
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
			
			$user->update();
			
            return redirect()->route('customer.dashboard')->with('success_message', 'Successfully Changed Your Password');

        } else {
            return redirect()->back()->with('error_message', 'Your Old Password is Wrong');
        }
	}
	
	public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flash('success_message', 'Successfully Loged Out');
        return redirect()->route('customer.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
