<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;



class CustomerController extends Controller
{
    public function account(User $user)
    {
        
    
            
            return view('backend.users.customer.account', compact('user'));
   

    }
    public function booking()
    {
        return view('backend.users.customer.booking-list');
    }

    public function wishlist()
    {
        return view('backend.users.customer.wishlist');
    }
}
