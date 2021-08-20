@component('mail::message')
# New album created

Album '{{ $album->title }}' (id {{ $album->id }}) was created 
at {{ $album->created_at }}

@endcomponent
