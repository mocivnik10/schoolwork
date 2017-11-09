<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Auth;

class RatingController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $rating = Auth::user()->ratings;
      $ratings_overall = round(Rating::all()->avg('rate'), 2);
      return view('rating.index', compact('rating', 'ratings_overall'));
    }

    public function store() {
      $data = request()->all();

      Rating::create([
        'rate' => $data['rating'],
        'user_id' => Auth::user()->id,
      ]);

      return back();

    }
}
