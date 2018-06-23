<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $cold;

    protected $hot;

    protected $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cold, $hot, $address)
    {
        $this->cold = $cold;
        $this->hot = $hot;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        if ($this->type == "COL" || "HOT") {
            return $this->view('comfortMail',
                ['hot' => $this->hot, 'cold' => $this->cold, 'address' => $this->address]);
        }
    }
    
}
