<?php

namespace App\Http\Controllers\Admin\SMS;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:255',
            'sender_id' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $messageType = 'error';
            $message = $validator->errors()->all();
            $message = implode(', ', $message);
            return response()->json(['messageType' => 'error', 'message' => $message], 500);
        }else{

        $phone = $request->input('phone');
        $message = $request->input('message');
        $senderId = $request->input('sender_id');
        $authToken = "2287|gbVI7WdVoG69zUFAV4cxCDddN0HsTUgiwgC86QvG";
        $payload = [
            'recipient' => $phone,
            'sender_id' => $senderId,
            'message' => $message,
        ];

            try {
                $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'authorization' => "Bearer $authToken",
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/json',
                ])->post('https://sms.send.lk/api/v3/sms/send', $payload);

                if ($response->successful()) {
                    $message = $response->json();
                    return response()->json(['messageType' => 'success', 'message' => 'SMS sent successfully!', 'data' => $message]);
                } else {
                    return response()->json(['messageType' => 'error', 'message' => $response->body()], 500);
                }
            } catch (\Exception $e) {
                return response()->json(['messageType' => 'error', 'message' => $e->getMessage()], 500);
            }
        }
    }
}
