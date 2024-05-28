<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MailUs as MailUsMail;
use Illuminate\Support\Facades\Mail;

class MailUs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $data;    
    public function __construct($data)
    {
        $this->data = $data;       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('bebeksultan491@gmail.com')->send(new MailUsMail($this->data));   
    }
}
