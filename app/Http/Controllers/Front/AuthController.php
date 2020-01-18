<?php

namespace App\Http\Controllers\Front;

use App\Models\BloodType;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;


class AuthController extends Controller
{
   public function register(){
       $governorates=Governorate::all();
       $bloods=BloodType::all();
       return view('front.signup',compact('governorates','bloods'));
   }
   public function registerSave(Request $request){
       $validation = $this->validate($request ->all(),[
           'name'=>'required',
           'email'=>'required|unique:clients',
           'password'=>'required',
           //confirmed
           'phone'=>'required|unique:clients',
           'date_birth'=>'required',
           'last_donation_date'=>'required',
           'blood_type_id'=>'required',
           'governorate_id'=>'required',
           'city_id'=>'required',
       ]);

       $request->merge(['password'=>bcrypt($request->password)]);
       $client =Client::create($request->all());
       $client->save();
       return view('front.signin');

   }

    public function login()
    {
        return view('front.signin');
    }

    public function loginSave(Request $request){
        $this->validate($request, [
            'phone'    => 'required',
            'password' => 'required',
        ]);
        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('client-web')->attempt($request->only('phone', 'password'))) {
                flash()->success('hello' . \auth()->guard('client-web')->user()->name);
                return redirect('index');
            } else {
                flash()->error('error in login');
                return back();
            }
        }
        flash()->error('لا يوجد حساب مرتبط بهذا الرقم');
        return back();
    }

    public function Profile(){
       return view('front.profileuser');
    }

    public function profileUpdate(Request $request,$id){
        $client=Client::findOrFail($id);
        $client->update($request->all());
        $client->save();
          if ($client){
              flash()->success('saved');
          }
          else{
              flash()->error('no saved');
          }
          return redirect(url('index'));

    }

    public function changePassword(Request $request)
    {
        $rules=[
            'oldPassword'=>'required',
            'password'=>'required|confirmed',];
        $messages=[
            'oldPassword.required'=>'oldPassword is required',
            'password.required'=>'Password is required',
        ];
        $this->validate($request,$rules,$messages);
        $user= Auth::user();
        if(Hash::check($request->oldPassword,$user->password) ){
            $user->password = bcrypt($request->password);
            $user->save();
            flash()->success("change password");
            return redirect('index');
        }
        else{
            flash()->error("error password");
            return view('password-client');
        }
    }

    public function changePasswordView()
    {
        return view('front.changepassword');
    }


    public function logout(){
       auth()->guard('client-web')->logout();
       return redirect(url('login-user'));
    }



}
