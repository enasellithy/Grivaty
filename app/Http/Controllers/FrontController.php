<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Portfolio;
use App\Team;
use App\Brand;
use App\About;

class FrontController extends Controller
{
    public function index()
    {
    	$about = About::all();
    	$brand = Brand::all();
    	$team = Team::all();
    	$portfolio = Portfolio::all();
    	$service = Service::all();
    	return view('welcome',['title'=>'Giravty'],
    		compact('service','portfolio','team','brand','about'));
    }
}
