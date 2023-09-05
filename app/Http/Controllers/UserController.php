<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'cname' => $request->cname,
            'sname' => $request->sname ?? null,
            'location' => $request->location,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
            'email' => $request->email,
            'organisation' => $request->organisation,
            'org_unit' => $request->org_unit,
            'description' => $request->description ?? null,
            'job' => $request->job ?? null,
            'accounter' => $request->accounter ?? null,
            'status' => $request->status ?? 1,
            'login' => $request->login ?? '',
            'inn' => $request->inn ?? null,
            'pinfl' => $request->pinfl ?? null,
            'passport_number' => $request->passport_number ?? null,
            'phone' => $request->phone ?? null,
            'localCode' => $request->localCode ?? null,
            'smsuid' => $request->smsuid ?? null,
            'fix' => $request->fix ?? 0,
            'password' => Hash::make($request->password),
            'comment' => $request->comment ?? null,
            'operator_id' => $request->operator_id ?? null,
            'branch_user_id' => $request->branch_user_id,
            'iabsID' => $request->iabsID ?? null,
            'fido_user_id' => $request->fido_user_id ?? null,
            'fido_user_type_id' => $request->fido_user_type_id ?? null,
        ]);

        return response()->json(['succes' => true, 'message' => 'Registration Successfully'], 200);
    }


    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['error' => true, 'message' => $validate->errors()], 401);
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['error' => true,
                'message' => 'Email & Password does not match with our record.'], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json(['succes' => true, 'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'user logged out'
        ];
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);;
        if (!$user) {
            return response()->json(['error' => true, 'message' => 'User not found']);
        }
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted']);
    }


//    public function changePassword(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'old_password' => 'string|min:6|required',
//            'password' => 'string|min:6|required',
//            'confirm_password' => 'string|min:6|required',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => true, $validator->messages()]);
//        }
//        $user = $request->user();
//        $inputs = $request->all();
//
//        if ($inputs['password'] !== $inputs['confirm_password']) {
//            return response()->json(['error' => true, 'message' => 'Passwords are not same']);
//        }
//        if (!Hash::check($inputs['old_password'], $user->password)) {
//            return response()->json(['error' => true, 'message' => 'Old password is wrong']);
//        }
//        $user->password = Hash::make($inputs['password']);
//        $user->save();
//
//        return response()->json(['success' => true, 'message' => 'Passwords changed successfuly']);
//    }


//    public function forgotPassword(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'email|nullable',
//            'phone' => 'numeric|nullable|digits:12|regex:/(998)[0-9]{9}/',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => true, $validator->messages()]);
//        }
//
//        $inputs = $request->only('email', 'phone');
//        if (empty($inputs['email']) && empty($inputs['phone'])) {
//            return response()->json(['error' => true, 'message' => 'Phone or Email field is required']);
//        }
//        if (!empty($inputs['email'])) {
//            $user = User::where(['email' => $inputs['email']])->first();
//        }
//        if (!empty($inputs['phone'])) {
//            $user = User::where(['phone' => $inputs['phone']])->first();
//        }
//        if ($user) {
//            $data = [
//                'cname' => $user->name,
//                'email' => $user->email,
//                'password' => Str::random(12),
//            ];
//            if (!empty($inputs['email'])) {
//                \Mail::send('emails.forgot', $data, function ($message) use ($data) {
//                    $message->from('noreply@test.uz', 'Test.uz');
//                    $message->to($data["email"]);
//                    $message->subject('Login details from Test.UZ');
//                });
//            }
//            if (!empty($inputs['phone'])) {
//                $token = $this->getSmsToken();
//                if ($token) {
//                    $smsMessage = 'Your password to login Test.UZ ' . $data['password'];
//                    //Send SMS
//                    $sended = $this->sendSMS($token, $user->phone, $smsMessage);
//                    if ($sended) {
//                        $user->password = \Illuminate\Support\Facades\Hash::make($data['password']);
//                        $user->save();
//                    }
//                }
//            }
//            return response()->json(['success' => true, 'message' => 'Password changed and sent your email|phone. Check it out.']);
//        }
//        return response()->json(['error' => true, 'message' => 'Not found']);
//    }
}
