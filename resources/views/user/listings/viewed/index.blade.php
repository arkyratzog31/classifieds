@extends ('layouts.app')

@section('content')
<div class="container">
  <h4>Showing your last {{ $indexLimit }} viewed listings.</h4>
  @if ($listings->count())
    @each ('listings.partials._listing', $listings, 'listing')

  @else
      <p>You have no viewed listings</p>
  @endif

</div>
@endsection
