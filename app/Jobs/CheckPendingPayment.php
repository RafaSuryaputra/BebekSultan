<?php

namespace App\Jobs;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckPendingPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {        
        $reservations = Reservation::where('status', 'waiting payment')
        ->where('payment_due_at', '<' , Carbon::now())            
        ->get();

        foreach ($reservations as $reservation) {          
          
                $reservation->update(['status' => 'canceled']);
            
        }
    }
}
