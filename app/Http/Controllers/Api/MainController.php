<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ReaetPassword;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    /*
        private function apiResponse($status,$message,$data=null){
            $response =[
                'status'=>$status,
                'message'=>$message,
                'data'=>$data
            ];
            return response()->json($response);
        }*/

    //fined governorates
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'done', $governorates);

    }

    //fined Categories
    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'done', $categories);

    }

    //fined blood_type
    public function bloodType()
    {
        $blood_types = BloodType::all();
        return responseJson(1, 'done', $blood_types);

    }

    //fined posts
    public function posts()
    {
        $posts = Post::all();
        return responseJson(1, 'done', $posts);

    }

    //post with search
    public function postWithSearch(Request $request)
    {
        $posts = Post::where(function ($query) use ($request) {
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
                //->with($this->categories().'name');
            }
            if ($request->input('keyword')) {
                $query->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%'.$request->keyword.'%')
                        ->orwhere('content', 'like', '%'.$request->keyword.'%');
                });
            }
        })->paginate(10);

        return responseJson(1, 'done', $posts);
    }

//fined cities
    public function cities(Request $request)
    {
        //Find all cities
        // $cities = City::all();

        /*Find the cities of id given El Peshawar on a specific governorate
        $cities = City::where('governorate_id' ,$request->governorate_id)->get();
        return $this->apiResponse(1,'done',$cities);*/
        //إذا قمت بكتابة id بيشاور علي محافظه معينة ، فقم بإظهار مدن هذه المحافظه واذا لم تكتب id يعرض كل المدن
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        return responseJson(1, 'done', $cities);
    }

    // send phone
    public function sendMessage(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validation->fails()) {
            return responseJson(0, $validation->errors()->first(), $validation->errors());
        }
        $send = Client::where('phone', $request->phone)->first();
        //dd($send);
        if ($send) {
            $code = rand('1111','9999');
            $update = $send->update(['pin_code' => $code]);
            if ($update) {
                //send phone
                //smsMisr($request->phone ,"yor reset code is :".$code);

                //send email
                Mail::to($send->email)
                    ->bcc('ahmedshaimaa39@gmail.com')
                    ->send(new ReaetPassword($code));
                return responseJson(1, 'برجاء فحص هاتفك', [
                    'pin_code_for_test' => $code,
                    // 'email_fails' => Mail::failures()
                ]);
            } else {
                return responseJson(0, 'حدث خطأ , حاول مره اخري');
            }
        } else {
            return responseJson(0, 'error');
        }
    }

    //fined profile and change
    public function profile(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->date_birth = $request->date_birth;
            $user->last_donation_date = $request->last_donation_date;
            $user->password = bcrypt($request->password);
            if ($user->save()) {
                return responseJson(1, 'done');
            }
        } else {
            return responseJson(0, 'لايوجد بيانات');
        }


    }

    //setting
    public function setting(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'notification_settings_text' => 'required',
            'email' => 'required|unique:settings',
            'phone' => 'required|unique:settings',
            'about_app' => 'required',
            'fb_link' => 'required',
            'tw_link' => 'required',
            'insta_link' => 'required',
            'goog_link' => 'required',
            'you_link' => 'required',
        ]);
        if ($validation->fails()) {
            return responseJson(0, 'validation error', $validation->errors());
        }
        $client = Setting::create($request->all());
        $client->save();
        return responseJson(1, 'done', $client);
    }

    //contact us
    public function contactUs(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
            'title' => 'required',
            'message' => 'required',
        ]);
        if ($validation->fails()) {
            return responseJson(0, 'validation error', $validation->errors());
        }
        $client = Contact::create($request->all());
        $client->save();
        return responseJson(1, 'done', [
            'client' => $client
        ]);
    }

    //donation Request
    public function donations(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'notes' => 'required',
            'age' => 'required',
            'bags_number' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
            'client_id' => 'required',
        ]);
        if ($validation->fails()) {
            return responseJson(0, 'validation error', $validation->errors());
        }
        /*$client =DonationRequest::create($request->all());
        $client->save();*/
        $donationRequest = $request->user()->donation_requests()->create($request->all());
      // return responseJson(1, 'validation error',  $donationRequest );
        $clientIds = $donationRequest->city->governorate->clients()->whereHas('blood_types', function ($q) use ($request) {
            $q->where('blood_types.id', $request->blood_type_id);
        })->pluck('clients.id')->toArray();
//        dd($clientIds);
        if (count($clientIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'احتاج متبرع لفصيله',
                'content' => $request->user()->name . 'محتاج متبرع لفصيله'
            ]);
           // dd($notification);
            $notification->client_notifications()->attach($clientIds);
           // dd($notification);
            $tokens = Token::whereIn('client_id', $clientIds)->where('token', '!=', null)->pluck('token')->toArray();

            if (count($tokens)) {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id
                ];
                $send = notifyByFirebase($title, $body, $data);
                return $send;
                info("firebase result:" . $send);
            }
        }
        return responseJson(1, 'تمت الاضافه بنجاح');
    }

    //donation WithSearch
    public function donationWithSearch(Request $request)
    {
        $client = DonationRequest::where(function ($query) use ($request) {
            if ($request->has('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
            if ($request->has('city_id')) {
                $query->where('city_id', $request->city_id);
            }
        })->paginate(10);
        return responseJson(1, 'done', $client);

    }

    // donation isread
    public function isRead(Request $request)
    {
        $client = $request->user()->client_notifications()->where('is_read','=',0);
        if ($client == 0) {
            return responseJson(1, 'no read',$client);
        } else {
            return responseJson(1, 'read');
        }
    }
}
