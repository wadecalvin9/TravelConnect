<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\review;



class DisplayController extends Controller

//destinations
{
public function index()
{
    $destinations = destination::all()->take(5);
    $tours = Tour::all()->take(5);
    $reviews = review::all();

    return view('welcome',compact('destinations','tours', 'reviews'));
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
    return view('Tours.index',compact('tours','destinations'));
}

}
