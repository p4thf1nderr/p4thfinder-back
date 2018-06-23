<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GazpromContact extends Mailable
{
    use Queueable, SerializesModels;

    protected $gas;

    protected $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gas, $address)
    {
        $this->gas = $gas;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
   
        return $this->view('gazpromMail',
            ['gas' => $this->gas, 'address' => $this->address]);
    }
    
}
