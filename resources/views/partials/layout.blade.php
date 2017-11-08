<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>School Work</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Autocomplete -->
        {{-- AIzaSyCEdF4PkzNGKtCnBkcAvz8FzjfgDaROL8I --}}
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCEdF4PkzNGKtCnBkcAvz8FzjfgDaROL8I&sensor=false&amp;libraries=places"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script src="/js/jquery.geocomplete.js"></script>
        <script src="/js/logger.js"></script>

    </head>
    <body>
      <div class="container">

        @include('partials.nav')

        @yield('content')

      </div>

      <script>
        $(function(){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          function handleNewWeatherINfo(data){
            console.log("response: ", data);
            $("#city-name").text(data.current_weather.city['name']);

            $("#cur-temp").text(data.friendly_temp.now + ' °C');
            $("#max-temp").text(data.friendly_temp.max + ' °C');
            $("#min-temp").text(data.friendly_temp.min + ' °C');

            for (var i = 1; i < data.forecast_temp.length + 1; i++) {
              $('#forecast-temp:nth-child('+i+')').text(Math.round(data.forecast_temp[i-1]) + ' °C');
            };
          }


          $("#geocomplete").geocomplete()
            .bind("geocode:result", function(event, result){
              var data = result.formatted_address;

              $.ajax({
                method: "GET",
                url: "/weather/search/",
                data: {
                  location: data
                }
              }).done(function(data) {
                handleNewWeatherINfo(data.data);
              });

              $.log("Result: " + result.formatted_address);
            })
            .bind("geocode:error", function(event, status){
              $.log("ERROR: " + status);
            })
            .bind("geocode:multiple", function(event, results){
              $.log("Multiple: " + results.length + " results found");
            });

          $("#find").click(function(){
            $("#geocomplete").trigger("geocode");
          });


          $("#examples a").click(function(){
            $("#geocomplete").val($(this).text()).trigger("geocode");
            return false;
          });

        });
      </script>

    </body>
</html>
