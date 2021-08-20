<?php

namespace App\Jobs;

use App\Mail\AlbumCreatedNotification;
use App\Models\Album;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendAlbumCreatedNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Album $album;

    public function __construct(Album $album)
    {
        $this->album = $album;
    }

    public function handle()
    {
        Mail::to(config('mail.notifications_reciever'))
            ->send(new AlbumCreatedNotification($this->album));
    }
}
