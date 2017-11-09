<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gmopx\LaravelOWM\LaravelOWM;
use Response;
use App\WeatherService;


class RestController extends Controller
{

  public function search(Request $req) {
    $city = explode(', ', $req->query('location'))[0];
    $country = explode(', ', $req->query('location'))[1];

    if (is_numeric(substr($city, 0, 1))) {
      $city = substr($city, 5);
    }

    $data = WeatherService::get_weather($city, $country);

    return Response::json(array(
      'success' => true,
      'data'   => $data
    ));
  }

    public function index() {
      $current_weather = WeatherService::get_current_weather();
      $forecast = WeatherService::get_forecast();

      return view('rest/weather.index', compact('current_weather', 'forecast'));
    }

}
