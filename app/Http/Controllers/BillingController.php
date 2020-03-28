<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use App\Jobs\BillUsers;
use App\User;
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
}
