@extends('partials.layout')

@section('content')
  <h1 class="mb text-center">Weather</h1>

  <hr>

  @include('partials.search')

  <div class="row">

    <div class="col-md-4">
      <div class="current_weather_info" id="city-info">
        <h3 id="city-name">{{ $current_weather->city->name . ', ' . $current_weather->city->country }}</h3>
        @if ($current_weather->weather->description == 'clear sky')
          <p>Clear sky</p>
        @elseif ($current_weather->weather->description == 'few clouds')
          <p>Few clouds</p>
        @elseif ($current_weather->weather->description == 'scattered clouds')
          <p>Scattered clouds</p>
        @endif

        {{--

        clear sky
        few clouds
        scattered clouds
        light rain && moderate rain
        overcast clouds

        --}}


        <div class="current_temp_info">
          Trenutna temperatura: <span id="cur-temp">{{ $current_weather->temperature->now }}</span> <br>
          Maximalna dnevna temperatura: <span id="max-temp">{{ $current_weather->temperature->max }}</span> <br>
          Minimalna dnevna temperatura: <span id="min-temp">{{ $current_weather->temperature->min }}</span>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="weather_forecast_info">
        <div class="temp_forecast">
          <h3>Vremenska Napoved</h3>


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
                    <td id="forecast-temp">{{ $weather->temperature }}</td>
                  @endforeach
                  </tr>
                </tbody>
              </table>


        </div>
      </div>
    </div>
  </div>

@endsection
