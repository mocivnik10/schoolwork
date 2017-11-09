<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gmopx\LaravelOWM\LaravelOWM;
use App\LocationService;

class WeatherService extends Model
{

    public static function get_weather($city, $country) {
      $lowm = new LaravelOWM();
      $current_weather = $lowm->getCurrentWeather($city);
      $forecast = $lowm->getWeatherForecast($city, '', '', 7);

      $parsed_data = array(
        "temp_now" => $current_weather->temperature->now->getValue(),
        "temp_max" => $current_weather->temperature->max->getValue(),
        "temp_min" => $current_weather->temperature->min->getValue(),
        "humidity" => $current_weather->humidity->getvalue(),
        "pressure" => $current_weather->pressure->getValue(),
      );


      $weekly_temp = array();
      $weekly_icon = array();
      foreach($forecast as $weather) {
       $weekly_temp[] = $weather->temperature->getValue();
       $weekly_icon[] = $weather->weather->icon;
     }

      $array = [
        'current_weather' => $current_weather,
        'forecast' => $forecast,
        'friendly_data' => $parsed_data,
        'forecast_temp' => $weekly_temp,
        'forecast_icon' => $weekly_icon
      ];
      return $array;
    }


    public static function get_current_weather() {
      $city = LocationService::getLocation();
      $lowm = new LaravelOWM();
      $current_weather = $lowm->getCurrentWeather($city);
      return $current_weather;
    }


    public static function get_forecast() {
      $city = LocationService::getLocation();
      $lowm = new LaravelOWM();
      $forecast = $lowm->getWeatherForecast($city, '', '', 7);
      return $forecast;
    }

}
