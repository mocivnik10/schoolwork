<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationService extends Model
{
  public static function getLocation() {
    $default_city = "Novo Mesto";
    $ip= \Request::ip();
    $data = \Location::get($ip);
    $city = $data->cityName;
    // dd($data);
    if ($city != null) {
      return $city;
    } else {
      return $default_city;
    }
  }
}
