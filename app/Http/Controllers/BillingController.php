<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use App\Jobs\BillUsers;
use App\User;
use Illuminate\Support\Facades\Log;


class BillingController extends Controller
{
     /**
     * Handle Queue Process
     */
    public function processQueue()
    {
      $users=User::all();
      dispatch(new BillUsers($users));
    }

    public function billUsers()
    {
        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                //call api
                $this->ApiMock();
                Log::info("Billed user : ".$user->username);
                $billing = new Billing;
    
                $billing->user_id = $user->id;
        
                $billing->save();
            }
        });
    }
    
    public function ApiMock(){
        sleep(1.6);
    }
}
