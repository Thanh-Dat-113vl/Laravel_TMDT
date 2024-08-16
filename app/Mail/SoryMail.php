<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SoryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Đơn hàng #'.session('id_donhang').' của bạn đã bị hủy')
        ->view('mail.sory')->with([
            // 'user'=>'caothanhdat113vl@gmail.com', //$this->user
            'content_sorry'=>session('content_sorry'),
        ]);
    }
}
