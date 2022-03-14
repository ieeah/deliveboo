<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRestaurant extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $surname;
    private $address;
    private $total;
    private $phone;
    private $mail;
    private $restaurant_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $surname, $address, $total, $phone, $mail, $restaurant_name)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->total = $total;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->restaurant_name = $restaurant_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.mailRestaurant')
        ->with([
            'name' => $this->name,
            'surname' => $this->surname,
            'address' => $this->address,
            'total' => $this->total,
            'phone' => $this->phone,
            'mail' => $this->mail,
            'restaurant_name' => $this->restaurant_name,
        ]);
    }
}
