@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Bulletin Board</h1>
    <a href="{{ route('bulletins.create') }}" class="btn btn-primary mb-3">Create Post</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        @foreach ($bulletins as $bulletin)
            <div class="col-md-6">
                <div class="bulletin-card">
                    <h5 class="card-title">{{ $bulletin->title }}</h5>
                    <p class="card-text">{{ $bulletin->content }}</p>
                    @if ($bulletin->media_path)
                        @if (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                            <img src="{{ Storage::url($bulletin->media_path) }}" class="img-fluid" alt="Media">
                        @elseif (in_array(pathinfo($bulletin->media_path, PATHINFO_EXTENSION), ['mp4', 'mov', 'avi']))
                            <video controls class="img-fluid">
                                <source src="{{ Storage::url($bulletin->media_path) }}" type="video/{{ pathinfo($bulletin->media_path, PATHINFO_EXTENSION) }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    @endif
                    <p class="card-text"><small class="text-muted">Author: {{ $bulletin->author }}</small></p>
                    <a href="{{ route('bulletins.edit', $bulletin->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bulletins.destroy', $bulletin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

