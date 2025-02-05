<?php
namespace Jiny\License\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class LicenseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $row;
    /**
     * Create a new message instance.
     */
    public function __construct($row)
    {
        $this->row = $row;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->row['email']),
            replyTo: [
                new Address('infohojin@naver.com', 'Hojin Lee'),
            ],
            subject: '라이센스 발급 안내',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $path = resource_path('license');
        if(!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $domain = str_replace(".","_",$this->row['domain']);
        $filename = $path."/".$domain."-".$this->row['code'].".txt";
        // 첨부파일 추가
        if(file_exists($filename)) {
            $this->attach($filename, [
                'as' => basename($filename),
                'mime' => 'application/octet-stream'
            ]);
        }


        return new Content(
            view: 'jiny-license::mail.license',
            with: [
                'row' => $this->row
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
