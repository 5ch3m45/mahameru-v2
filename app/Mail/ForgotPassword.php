<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forgot-password', [
                'user' => $this->user,
                'token' => $this->token
            ])
            ->to($this->user->email)
            ->subject('Token Reset Password Apps MAHAMERU');
    }
}
