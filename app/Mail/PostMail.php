<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Gudep;
use DB;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $nama_gudep;
    public function __construct($name, $nama_gudep)
    {
        $this->name = $name;
        $this->nama_gudep = $nama_gudep;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Akun Gudep Diaktifkan')->view('email_verifikasi');
        //return $this->view('');
    }
}
