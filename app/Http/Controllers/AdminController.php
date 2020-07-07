<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AdminController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index()
    {

        return View::make('welcome');
    }
    

}
