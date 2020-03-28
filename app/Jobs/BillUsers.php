<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Billing;

class BillUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $users;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         //Log::info("Billed user : ".$this->user->username);

      
            foreach ($users as $user) {
                
            //call api
            $this->ApiMock();             
            Log::info("Billed user : ".$user->username);
            $billing = new Billing;

            $billing->user_id = $user->id;
    
            $billing->save();
            
            }
         
    }

    public function ApiMock(){
        sleep(1.6);
    }
}
