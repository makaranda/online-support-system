<?php

namespace App\Http\Controllers\Admin\Email;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Models\MessageFormats;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
            'cc' => 'nullable|email',
            'bcc' => 'nullable|email',
            'replyTo' => 'nullable|email',
            'message_format_id' => 'required|exists:message_formats,id',
        ]);

        if ($validator->fails()) {
            $messageType = 'error';
            $message = $validator->errors()->all();
            $message = implode(', ', $message);
            return response()->json(['messageType' => 'error', 'message' => $message], 500);
        }

        $messageFormat = MessageFormats::find($request->input('message_format_id'));
        if (!$messageFormat) {
            return response()->json(['messageType' => 'error', 'message' => 'Message format not found'], 404);
        }

        $data = [
            '[customer_name]' => 'John Doe',
            '[ticket_id]' => 'TKT-12345',
            '[subject]' => 'Login Issue'
        ];

        $messageTemplate = preg_replace_callback('/\[(.*?)\]/', function ($matches) use ($data) {
            return $data['[' . $matches[1] . ']'] ?? 'N/A';
        }, $messageFormat->content);

        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');


            $mail->setFrom(env('MAIL_FROM_ADDRESS', 'your-email@gmail.com'), env('MAIL_FROM_NAME', 'Your Name'));
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $messageTemplate;

            if (!$mail->send()) {
                return response()->json(['messageType' => 'error', 'message' => 'Failed to send email: ' . $mail->ErrorInfo], 500);
            } else {
                return response()->json(['messageType' => 'success', 'message' => 'Email sent successfully!']);
            }

        } catch (Exception $e) {

            return response()->json(['messageType' => 'error', 'message' => 'Failed to send email: ' . $mail->ErrorInfo], 500);
        }
    }

}
