<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return "";
    }
    public function success(){
        return View("success");
    }
    public function cancel(){
        return View("cancel");
    }
    public function checkoutpay(){
        return View("checkoutpay");
    }
}
