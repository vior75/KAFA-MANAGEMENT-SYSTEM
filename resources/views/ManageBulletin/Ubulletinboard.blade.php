@extends('layout2')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Bulletin Board</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        @foreach ($bulletins as $bulletin)
            <div class="col-md-6 mb-4">
                <div class="card bulletin-card">
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
                        <h5 class="card-title">
                            <a href="{{ route('Ubulletinboard.show', $bulletin->id) }}">{{ $bulletin->title }}</a>
                        </h5>
                        <p class="card-text">
                            @if (str_word_count($bulletin->content) > 20)
                                {{ implode(' ', array_slice(explode(' ', $bulletin->content), 0, 20)) }}...
                                <a href="{{ route('Ubulletinboard.show', $bulletin->id) }}" class="text-primary">See more</a>
                            @else
                                {{ $bulletin->content }}
                            @endif
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Author: {{ $bulletin->author }}</small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">Posted on: {{ $bulletin->created_at->format('F j, Y, g:i a') }}</small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
