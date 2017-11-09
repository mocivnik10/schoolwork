@extends('partials.layout')

@section('content')
  <h1 class="mb text-center">Weather</h1>

  <hr>

  @include('partials.search')

  <div class="row">

    <div class="col-md-4">
      <div class="current_weather_info" id="city-info">
        <h2 id="city-name">{{ $current_weather->city->name . ', ' . $current_weather->city->country }}</h2>

        {{ HTML::image('images/weather/' . $current_weather->weather->icon . '.png', 'weather icon' , array('id' => 'weather-icon')) }}

        <hr>
        <div class="current_temp_info">
          Current temperature: <strong><span id="cur-temp">{{ $current_weather->temperature->now }}</span></strong> <br>
          Max day temperature: <strong><span id="max-temp">{{ $current_weather->temperature->max }}</span></strong> <br>
          Min day temperature: <strong><span id="min-temp">{{ $current_weather->temperature->min }}</span></strong>
        </div>
        <hr>
        <div class="current_humidity_pressure">
          Humidity: <strong><span id="weather-humidity">{{ $current_weather->humidity }}</span></strong> <br>
          Pressure: <strong><span id="weather-pressure">{{ $current_weather->pressure }}</span></strong>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="weather_forecast_info">
        <div class="temp_forecast">
          <h3>Weather Forecast</h3>


              <table class="table">
                <thead>
                  <tr>
                  @foreach ($forecast as $weather)
                    <th>{{ $weather->time->day->format('d.m.Y') }}</th>
                  @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  @foreach ($forecast as $weather)
                    <td id="forecast-temp">{{ round($weather->temperature->getvalue()) . ' °C'}}</td>
                  @endforeach
                  </tr>
                  <tr>
                  @foreach ($forecast as $weather)
                    <td id="forecast-icon">{{ HTML::image('images/weather/' . $weather->weather->icon . '.png') }}</td>
                  @endforeach
                  </tr>
                </tbody>
              </table>


        </div>
      </div>
    </div>
  </div>

@endsection
