<?php

namespace App\Mail;

use App\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendMail extends Mailable
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
        $currentUser = auth()->user();
        $cart = Cart::where("user_id", Auth::id())
            ->where("is_checkout", true)
            ->with("getItems")
            ->firstOrFail();
        return $this->view('mail.checkout-form',[
            "cart" => $cart->getItems,
            "user" => $currentUser,
        ]);
    }
}
