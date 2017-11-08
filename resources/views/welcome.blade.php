  @extends('partials.layout')


  @section('content')
    <div class="text-center landing-content">


        <div class="content">
            <div class="title m-b-md">
                Spletno Programiranje 2
            </div>

            <div class="author m-b-md">
              Iztok Močivnik
            </div>

            <div class="links weather-button">
                <a class="weather-link" href="/weather">WEATHER APP</a>
            </div>
        </div>
    </div>


    <script type="text/javascript">
      $('body').addClass("welcome-gif-wrapper");
    </script>
  @endsection
