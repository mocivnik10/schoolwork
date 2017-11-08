<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\Location\Location;

class LocationService extends Model
{
  public static function getLocation() {
    $default_city = "Novo Mesto";
    $location = new Location;

    $ip= \Request::ip();
    $data = $location->get($ip);
    $city = $data->cityName;

    if ($city != null) {
      return $city;
    } else {
      return $default_city;
    }
  }
}
