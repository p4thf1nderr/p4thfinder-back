<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;

    protected $type;

    protected $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $type, $address)
    {
        $this->message = $message;
        $this->type = $type;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($type == WATER) {
            $type = 'Показания счетчиков холодной и горячей воды';
        } elseif ($type == GAS) {
            $type = 'Показания газового счетчика';
        }

        return $this->view('communalMail',
            ['type' => $type,'message' => $message, 'address' => $address]);
    }
    
}
