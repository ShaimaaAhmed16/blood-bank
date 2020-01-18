<?php

namespace App\Http\Controllers\Front;

use App\Models\BloodType;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\City;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReaetPassword;
use Validator;
class MainController extends Controller
{
    public function home(Request $request){
       // $client=Client::first();
        //auth('client-web')->login($client);
        $posts=Post::take(5)->get();
        //$donations = DonationRequest::paginate(10);
        $city = City::all();
        $blood=BloodType::all();
        $donations = DonationRequest::where(function ($query) use ($request) {
           if ($request->blood_type_id) {
                    $query->where('blood_type_id',$request->blood_type_id);
                }
            if ($request->city_id) {
                $query->where('city_id',$request->city_id);
            }
//            if ($request->city_id && $request->blood_type_id ) {
//                $query->where(function ($query) use ($request) {
//                    $query->where('blood_type_id',$request->blood_type_id)
//                        ->orwhere('city_id',$request->city_id);
//                });
         //   }

        })->paginate(5);
        return view ('front.index',compact('posts','donations','city','blood'));
    }
    public function about(){
        $setting = Setting::find(1);
        return view ('front.about',compact('setting'));
    }
    public function toggleFavourite(Request $request){
        $request->user()->client_posts()->toggle($request->post_id);
    }
    public function donate($id){
        $donation= DonationRequest::find($id);
        return view ('front.donator',compact('donation'));
    }
    public function donation(Request $request){
        $city = City::all();
        $blood=BloodType::all();
        $donation = DonationRequest::where(function ($query) use ($request) {
            if ($request->blood_type_id) {
                $query->where('blood_type_id',$request->blood_type_id);
            }
            if ($request->city_id) {
                $query->where('city_id',$request->city_id);
            }
        })->paginate(2);
        return view ('front.donations',compact('donation','city','blood'));

    }
    public function contact(){
        $setting = Setting::find(1);
        return view ('front.contact',compact('setting'));
    }
    public function contacts(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:contacts',
            'title'=>'required',
            'message'=>'required',
            'phone'=>'required',

        ]);
        $client =Contact::create($request->all());
        $client->save();
        flash()->message('contact ahs been sent successfuly');
        return back();
    }
    public function weare(){
        $setting = Setting::find(1);
        return view('front.weare',compact('setting'));

    }

    public function settingnotifcation(){
        $blood=BloodType::all();
        $govrn=Governorate::all();
        $setting=Setting::find(1);
        return view('front.settingnotifcainon',compact('blood','govrn','setting'));
    }

    public function add(){
        return view('front.adddonate');
    }
    public function create(Request $request){
        $this->validate($request, [
            'patient_name'=>'required',
            'patient_phone'=>'required',
            'notes'=>'required',
            'age'=>'required',
            'bags_number'=>'required',
            'hospital_name'=>'required',
            'hospital_address'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'city_id'=>'required',
            'blood_type_id'=>'required',
            'client_id'=>'required',

        ]);
        $client =DonationRequest::create($request->all());
        $client->save();
        flash()->message('contact ahs been sent successfuly');
        return back();

    }

    public function rsetpassword(){
        return view('front.resetpassword');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        $send = Client::where('email', $request->email)->first();
        //dd($send);
        if ($send) {
            $code = rand('1111','9999');
            $update = $send->update(['pin_code' => $code]);
            if ($update) {
                //send email
                Mail::to($send->email)
                    ->bcc('ahmedshaimaa39@gmail.com')
                    ->send(new ReaetPassword($code));
               flash()->message('برجاء فحص الهاتف');
               return view('front.resetpass');
            } else {
                flash()->message('حاول مره اخري');
            }
        } else {
            flash()->message('حاول مره اخري');
        }
    }


    public function changePassword(Request $request){
        $this->validate($request, [
            'code'=>'required',
            'password'=>'required|confirmed',
        ]);
        $user = Client::where('pin_code',$request->code)->first();
        if($user){
            $user->password = bcrypt($request->password);
            $user->pin_code = null;
            if($user->save()){
                flash()->message('تم تغيير كلمه المرور بنجاح');
                return redirect(url('login-user'));
            }
            else{
                flash()->message('حدث خطا, حاول مره اخري');
                return back();
            }
        }
        else{
            flash()->message('هذا الكود غير صحيح');
            return back();
        }

    }

    public function notificationSettings(Request $request)
    {
        $this->validate($request, [
            'blood_types' => 'required|array',
            'governorates' => 'required|array',
        ]);
        $request->user()->blood_types()->sync($request->blood_types);
        $request->user()->client_governorates()->sync($request->governorates);
        flash()->message('تم الحفظ');
        return back();
    }

}
