@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ $bulletin->title }}</h1>
    <div class="card">
        @if ($bulletin->media_path)
            @if (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ Storage::url($bulletin->media_path) }}" class="card-img-top" alt="Media">
            @elseif (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                <video controls class="card-img-top">
                    <source src="{{ Storage::url($bulletin->media_path) }}" type="video/{{ pathinfo($bulletin->media_path, PATHINFO_EXTENSION) }}">
                    Your browser does not support the video tag.
                </video>
            @endif
        @endif
        <div class="card-body">
            <p class="card-text">{{ $bulletin->content }}</p>
            <p class="card-text">
                <small class="text-muted">Author: {{ $bulletin->author }}</small>
            </p>
            <p class="card-text">
                <small class="text-muted">Posted on: {{ $bulletin->created_at->format('F j, Y, g:i a') }}</small>
            </p>
        </div>
    </div>
</div>
@endsection