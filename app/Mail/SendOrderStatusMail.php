<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_data)
    {

        $this->user_data = $user_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.order_status', [
            'cart_id' => $this->user_data[0]->id,
            'cart_updated_at' => $this->user_data[0]->updated_at,
            'user_name' => $this->user_data[0]->cartCustomer->name,
            'status_name' => $this->user_data[0]->cartStatus->title,
            'status_description' => $this->user_data[0]->cartStatus->description
        ]);
    }
}
