<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\RoomFavorite;
use Auth;

class CustomerHomeController extends Controller
{
    public function index()
    {
        $customerId = Auth::guard('customer')->user()->id;
        
        $total_completed_orders = Order::where('status','Completed')->where('customer_id', $customerId)->count();
        $total_pending_orders = Order::where('status','Pending')->where('customer_id', $customerId)->count();
        
        // Get liked and favorited rooms
        $liked_rooms = RoomFavorite::with('room')
            ->where('customer_id', $customerId)
            ->where('type', 'like')
            ->latest()
            ->take(4)
            ->get();
            
        $favorited_rooms = RoomFavorite::with('room')
            ->where('customer_id', $customerId)
            ->where('type', 'favorite')
            ->latest()
            ->take(4)
            ->get();
        
        return view('customer.home', compact(
            'total_completed_orders',
            'total_pending_orders',
            'liked_rooms',
            'favorited_rooms'
        ));
    }
}
