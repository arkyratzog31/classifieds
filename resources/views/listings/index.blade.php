@extends('layouts.app')

@section('content')
<div class="container">
  @include ('listings.partials._search')

  <h4>{{ $category->parent->name }} &nbsp > &nbsp {{ $category->name }}</h4>

  <hr>

  @if ($listings->count())
    @foreach ($listings as $listing)
      @include ('listings.partials._listing', compact('listing'))
    @endforeach

    {{ $listings->links() }}

  @else
    <p>No listings found.</p>
  @endif
</div>
@endsection
