<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
//use App\Models\Users;
use Carbon\Carbon;
class ForgotPassWordMail extends Mailable
{
    use Queueable, SerializesModels;
    // private $pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->users = new Users();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $timedeadotp = Carbon::now()->addSeconds(60);
        // session()->put('timedeadotp',$timedeadotp);
        return $this
        ->subject('Mật khẩu mới của người dùng: '.session('username'))
        ->view('mail.forgotpassmail')->with([
            // 'user'=>'caothanhdat113vl@gmail.com', //$this->user
            'newpass'=>session('newpass'),
        ]);
    }
}
