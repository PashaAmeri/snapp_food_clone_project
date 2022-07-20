<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendOrderStatusMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class OrderStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $to_user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to_user)
    {

        $this->to_user = $to_user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to($this->to_user->cartCustomer->email)->send(new SendOrderStatusMail([$this->to_user]));
    }
}
