<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\Tour;
use Illuminate\Http\Request;



class DisplayController extends Controller

//destinations
{
public function index()
{
    $destinations = destination::all()->take(5);
    $tours = Tour::all()->take(5);

    return view('welcome',compact('destinations','tours'));
 }
 public function getalldestinations()
 {
    $destinations = destination::all();
    return view('destinations.index',compact('destinations'));
 }

 //Tours

 public function getalltours()
 {
  $tours = Tour::all();
  $destinations = destination::all();
    return view('tours.index',compact('tours','destinations'));
}

}
