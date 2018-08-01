@component ('listings.partials._base_listing', compact('listing'))
    @slot('links')
        <ul class="list-inline">
            <li>Added {{ $listing->pivot->created_at->diffForHumans() }}</li>
            <li><a href="#" onclick="event.preventDefault(); document.getElementById('listings-favorites-destroy-{{ $listing->id }}').submit();">Delete</a></li>
        </ul>

        <form action="{{ route('listings.favorites.destroy', [$area, $listing]) }}" method="post" id="listings-favorites-destroy-{{ $listing->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
    @endslot
@endcomponent
