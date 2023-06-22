<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the application's Order Page.
     *
     * @return \Illuminate\View\View
     */
    public function getOrderPage()
    {
        return view('backend.admin.orders.index');
    }
}
