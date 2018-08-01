@extends('layouts.app')

@section('content')
<div class="container">
  @if ($listings->count())
      @each ('listings.partials._listing_favorite', $listings, 'listing')

      {{ $listings->links() }}
  @else
      <p>No favorite listings.</p>
  @endif

</div>
@endsection
