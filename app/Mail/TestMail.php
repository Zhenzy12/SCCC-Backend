<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     */
    public function build()
    {
        $message = 'This is your test message content';  // Add your test message here
        
        return $this->subject('Test Email Subject')
                    ->html($this->emailBody($message));  // Pass the message directly to the emailBody method
    }

    protected function emailBody(string $message): string
    {
        return <<<HTML
        <html>
            <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333;">
                <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <h2 style="color: #555;">Test Email</h2>
                    <p>This is a test email. Below is the message content:</p>
                    <p style="font-size: 16px; color: #2d3748; text-align: center;">{$message}</p>
                    <p>If you didn’t expect this email, please ignore it.</p>
                    <hr>
                    <p style="font-size: 12px; color: #888;">&copy; 2025 YourAppName. All rights reserved.</p>
                </div>
            </body>
        </html>
        HTML;
    }
}
