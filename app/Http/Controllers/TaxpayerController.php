<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaxpayerController extends Controller
{
   public function index(){
       return view('taxpayer.dashboard');
   }
}