Hi {{ $listing->user->name }}, <br><br>

{{ $sender->name }} has contacted you about your listing, <a href="{{ route('listings.show', [$listing->area, $listing]) }}"> {{ $listing->title }}</a>

---<br>

{!! nl2br(e($body)) !!}

---<br><br>

Reply directly to this email to  get back to them.
