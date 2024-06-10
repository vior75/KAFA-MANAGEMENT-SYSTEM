@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Bulletin</h1>
    <form action="{{ route('bulletins.update', $bulletin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $bulletin->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="4" required>{{ $bulletin->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $bulletin->author }}" required>
        </div>
        <div class="mb-3">
            <label for="media" class="form-label">Media</label>
            <input type="file" class="form-control" id="media" name="media" accept="image/*,video/*">
            @if ($bulletin->media_path)
                <small>Current media: <a href="{{ Storage::url($bulletin->media_path) }}" target="_blank">View</a></small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
