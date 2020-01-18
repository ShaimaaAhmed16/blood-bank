<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\BloodType;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Setting;
use App\Token;
use Illuminate\Http\Request;
use Hash;
use SebastianBergmann\CodeCoverage\TestFixture\C;
use Validator;
class AthController extends Controller
{
    /*
    private function apiResponse($status,$message,$data=null){
        $response =[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        return response()->json($response);
    }
*/
    public function register(Request $request){
        $validation = validator()->make($request ->all(),[
            'name'=>'required',
            'email'=>'required|unique:clients',
            'password'=>'required|confirmed',
            'phone'=>'required|unique:clients',
            'date_birth'=>'required',
            'last_donation_date'=>'required',
            'city_id'=>'required',
            'blood_type_id'=>'required',
        ]);
        if ($validation->fails()){
            return responseJson(0,'validation error' ,$validation->errors());
        }
        $request->merge(['password'=>bcrypt($request->password)]);
        $client =Client::create($request->all());
        $client->api_token =str_random(60);
        $client->save();
        return responseJson(1,'done' ,[
           'api_token'=>$client ->api_token,
            'client' => $client
        ]);
       // return $this->apiResponse(0,'done' ,$client);
    }

  //login

    public function login(Request $request){
        $validation = validator()->make($request ->all(),[
            'phone'=>'required',
            'password'=>'required'
        ]);
        if ($validation->fails()){
            return responseJson(0,$validation->errors()->first() ,$validation->errors());
        }

        //return auth()->guard('api')->validate($request->all());
        $client =Client::where('phone',$request->phone)->first();
        if($client){
            if(Hash::check($request->password ,$client->password)){
                return responseJson(1,'done' ,[
                   'api_token'=>$client ->api_token,
                    'client' => $client
                ]);

            }
            else{
                return responseJson(0,'error');
            }
        }
        else{
            return responseJson(0,'error');
        }
    }

    //change password
    public function changePassword(Request $request){
        $user = Client::where('pin_code',$request->pin_code)->first();
        if($user){
        $user->password = bcrypt($request->password);
        $user->pin_code = null;
        if($user->save()){
            return responseJson(1,'تم تغيير كلمه المرور بنجاح');
        }
        else{
            return responseJson(0,'حدث خطا, حاول مره اخري');
        }
        }
        else{
            return responseJson(0,'هذا الكود غير صحيح');
        }


    }

 //register Token
    public function registerToken(Request $request){
        $validation = validator()->make($request ->all(),[
            'token'=>'required',
            'type'=>'required|in:android,ios',
        ]);
        if ($validation->fails()){
            return responseJson(0,$validation->errors()->first() ,$validation->errors());
        }
        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
       /* Token::create([
            'token' =>'',
            'type' =>'',
            'client_id' =>$request->user()->id
        ]);  بتساوى السطر اللي قبله  */
        return responseJson(1,'تم التسجيل بنجاح ');
    }

  // remove Token
    public function removeToken(Request $request){
        $validation = validator()->make($request ->all(),[
            'token'=>'required',
        ]);
        if ($validation->fails()){
            return responseJson(0,$validation->errors()->first() ,$validation->errors());
        }
        Token::where('token',$request->token)->delete();
        return responseJson(1,'تم الحذف بنجاح ');
    }

 //view governorates & blood_types الفصايل والمحافظات اللي هو اختارها
    public function  viewNotificationSettings(Request $request)
    {
        $data=[
            'blood_types'=>$request->user()->blood_types()->pluck('blood_types.id')->toArray(),
            'governorates'=>$request->user()->client_governorates()->pluck('governorates.id')->toArray(),
        ];
        return responseJson(1,'done',$data);
    }

 //notification Settings   بيحفظ البيانات اللي اخترها
    public function notificationSettings(Request $request)
    {
        // validation governorates & blood_types required - array
        // 'governorates.*' => 'exists:governorates,id'
        $validation = validator()->make($request ->all(),[
            'blood_types'=>'required|array',
            'governorates'=>'required|array',
        ]);
        if ($validation->fails()){
            return responseJson(0,$validation->errors()->first() ,$validation->errors());
        }
        $request->user()->blood_types()->sync($request->blood_types);
        $request->user()->client_governorates()->sync($request->governorates);
        return responseJson(1,'done');

    }
//هيعمل مفضل  علي البوست اوهيعمل ويلغيه
    public function toggleFavourite(Request $request)
    {$validation = validator()->make($request ->all(),[
        'post_id'=>'required',

    ]);
        if ($validation->fails()){
            return responseJson(0,$validation->errors()->first() ,$validation->errors());
        }
        if($request->has('post_id')){
            $request->user()->client_posts()->toggle($request->post_id);
        }
        return responseJson(1,'done');

    }
 //هيعرض البوست المفضل
    public function favourite(Request $request){
            $post=$request->user()->client_posts()->paginate(5);
             return responseJson(1,'done',$post);
    }

//        $user = BloodType::all();
//        $client = $user->pluck('name');
//        $gove = Governorate::all();
//        $clien = $gove->pluck('name');
//        return $this->apiResponse(1, 'done', [$client, $clien]);
//        $users = $request->user();
//        $users->blood_types()->sync($request->blood_type_id);
//        dd($users);
//        if ($users) {
//            return $this->apiResponse(1, 'done', $users);
//        }
}
