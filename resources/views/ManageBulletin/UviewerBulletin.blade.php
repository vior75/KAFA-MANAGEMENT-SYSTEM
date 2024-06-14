@extends('layout2')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $bulletin->title }}</h1>
    @if ($bulletin->media_path)
        @if (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
            <img src="{{ Storage::url($bulletin->media_path) }}" class="img-fluid mb-3" alt="Media">
        @elseif (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
            <video controls class="img-fluid mb-3">
                <source src="{{ Storage::url($bulletin->media_path) }}" type="video/{{ pathinfo($bulletin->media_path, PATHINFO_EXTENSION) }}">
                Your browser does not support the video tag.
            </video>
        @endif
    @endif
    <p>{{ $bulletin->content }}</p>
    <p><small class="text-muted">Author: {{ $bulletin->author }}</small></p>
    <p><small class="text-muted">Posted on: {{ $bulletin->created_at->format('F j, Y, g:i a') }}</small></p>
</div>
@endsection
