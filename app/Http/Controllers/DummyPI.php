<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyPI extends Controller
{
    public function getData()
    {
    	return ["first_name"=>'Akshay',
    			'last_name'=>'Rao'
    			];
    }
}
