<?php

namespace App\Mail;

use App\Models\Album;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlbumCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Делаем свойство public, чтобы к нему можно было получить
     * доступ из blade файла
     */
    public Album $album;

    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails\album-created');
    }
}
