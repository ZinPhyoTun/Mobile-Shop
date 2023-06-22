<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show the application's Payment Page.
     *
     * @return \Illuminate\View\View
     */
    public function getPaymentPage()
    {
        return view('backend.admin.payments.index');
    }
}
