@extends('layouts.app')

@section('content')
<main class= "py-4">
  <div class="container">
      <div class="row">
        @if (!Auth::guest())
          <div class="col-md-3">
              <div class="panel panel-default">
                  <div class="panel-body">
                      <nav class="nav-stacked">
                        <nav class= "nav">
                          <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('listings.share.index', [$area, $listing]) }}">Email to a friend</a></li>
                            @if(!$listing->favoritedBy(Auth::user()))
                              <li class="list-group-item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('listings-favorite-form').submit();">Add to favorites</a>
                                <form class="hidden" action="{{ route('listings.favorites.store', [$area, $listing]) }}" method="post" id="listings-favorite-form">
                                  {{ csrf_field() }}
                                </form>
                              </li>
                            @endif
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
        @endif
          <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h3>
              </div>
              <div class="panel body">
                <hr>
                {!! nl2br(e($listing->body)) !!}
                <hr><p>Viewed {{ $listing->views() }} times</p>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">
                <hr>Contact {{ $listing->user->name }}
              </div>
              <div class="panel-body">
                @if(Auth::guest())
                <p><a href="/register"> Sign up</a> for an account or  <a href="/login">sign in</a> to contact listing owners. </p>
                @else
                  <form action="{{ route('listings.contact.store',[$area,$listing]) }}" method="post">
                    <div class="form-group {{ $errors->has('message') ? 'has-error' : ' ' }}">
                      <label for="message" class= 'control-label'>Message</label>
                      <textarea name="message" id='message' rows="8" cols="40" class="form-control"></textarea>

                      @if ($errors->has('message'))
                        <span class = 'help-block'>
                          {{ $errors->first('message') }}
                        </span>
                      @endif

                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-default">Send</button>
                      <span class="help-block">
                        <hr>This will email {{ $listing->user->name }} and they'll be able to reply to your email.
                      </span>
                    </div>
                    {{ csrf_field() }}
                  </form>
                @endif
              </div>
            </div>
        </div>
    </div>
</main>
@endsection
