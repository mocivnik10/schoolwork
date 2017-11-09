@extends('partials.layout')

@section('content')
  <h1 class="text-center mt mb">Rate the App</h1>
  <p class="text-center">Overall: <strong>{{ $ratings_overall }}</strong></p>
  @if ($rating != null)
    <p class="text-center">Your rate: <strong>{{ $rating->rate }}</strong></p>
    <hr>

  @else
    <hr>
    <section class='rating-widget mt'>

      <div class='rating-stars text-center'>
        <ul id='stars'>
          <li class='star' title='Poor' data-value='1'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Fair' data-value='2'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Good' data-value='3'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='Excellent' data-value='4'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li class='star' title='WOW!!!' data-value='5'>
            <i class='fa fa-star fa-fw'></i>
          </li>
        </ul>
      </div>

      <div class="rating-form text-center">
        <form class="" action="/rating" method="POST">
          {{ csrf_field() }}
          <input id="stars-input" type="hidden" name="rating" value="">
          <button type="submit" name="button" class="btn btn-info">Rate</button>
        </form>
      </div>

    </section>
  @endif

@endsection
