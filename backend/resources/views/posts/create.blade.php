@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
     <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label text-secondary">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title here" value="{{ old('title') }}" autofocus>
            @error('title')
               <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label text-secondary">Body</label>
            <textarea name="body" id="body" rows="5" class="form-control" placeholder="Start writing...">{{ old('body') }}</textarea>
            @error('body')
               <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label text-secondary">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
            <div class="form-text" id="image-info">
                Acceptable formats are jpeg, jpg, png, gif only.<br>
                Maxcimum file size is 1048KB.
            </div>
            @error('image')
               <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>
     </form>
@endsection