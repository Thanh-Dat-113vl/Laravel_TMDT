<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassWordMail;
use App\Mail\SoryMail;
class SendMailController extends Controller
{
    public function sendmail(Request $request)
    {
        // $user  = 'caothanhdat113vl@gmail.com'; muon su dung la phai chuyen bien qua
        // $mailable = new HelloGmail($user);
        // $otp = rand(0, 99999);
        // $request->session()->put('otp',$otp);
        $email = session('emailforgot');
        $mailable = new ForgotPassWordMail();
        Mail::to($email)->send($mailable);//su dung queue nhanh hon ->send
        // return view('client.gmail.hello');
        //return redirect()->route('getxacthucmail');
        session()->flash('success', 'Mặt khẩu đã cập nhật vui lòng xác nhận Mail');
        return redirect()->route('login');
    }

    public function sendmailsorry(Request $request)
    {
        $email = session('emailsorry');
        $mailable = new SoryMail();
        Mail::to($email)->queue($mailable);//su dung queue nhanh hon ->send
        session()->flash('success', 'Gửi gmail và hủy đơn thành công');
        return redirect()->route('adminOrder');
    }
}
