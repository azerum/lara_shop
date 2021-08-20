<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmail extends Command
{
    protected $signature = <<<SIGNATURE
    send:email 
      { recievers* : email addresses of recievers } 
      { --copy=* : email addresses to which copy of the email should be sent }
    SIGNATURE;

    protected $description = 'Send email letter';

    protected $help = <<<HELP
    Example usage: 
      php artisan send:email bob@example.com --copy=jack@example.com --copy=mary@example.com

    HELP;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        echo 'Recievers: ';
        dump($this->argument('recievers'));

        echo 'Copy to: ';
        dump($this->argument('copy'));

        return 0;
    }
}
