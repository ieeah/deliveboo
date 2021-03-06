<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailGuest extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $address;
    private $total;
    private $restaurant_name;
    private $plates_decode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $address, $total, $restaurant_name, $plates_decode)
    {
        $this->name = $name;
        $this->address = $address;
        $this->total = $total;
        $this->restaurant_name = $restaurant_name;
        $this->plates_decode = $plates_decode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.mailGuest')
        ->with([
            'name' => $this->name,
            'address' => $this->address,
            'total' => $this->total,
            'restaurant_name' => $this->restaurant_name,
            'plates_decode' => $this->plates_decode
        ]);
    }
}
