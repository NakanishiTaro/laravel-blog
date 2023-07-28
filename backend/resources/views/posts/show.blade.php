@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
<div class="mt-2 border border-2 rounded py-3 px-4 shadow-sm">
    <h2 class="h4">{{ $post->title }}</h2>
    <h3 class="h6 text-secondary">{{ $post->user->name }}</h3> {{-- user relationship methodd --}}
    <p>{{ $post->body }}</p>

    <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="w-100 shadow">{{-- asset is access the public folder --}}
</div>

<form action="{{ route('comment.store', $post->id) }}" method="post">
    @csrf
    <div class="input-group mt-5">
        <input type="text" name="comment" class="form-control" placeholder="Add a comment..." value="{{ old('comment') }}">
        <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
    </div>
     
    @error('comment')
       <div class="text-danber small">{{ $message }}</div>
    @enderror
</form>
@if($post->comments)
   <div class="mt-2 mb-5">
     @foreach($post->comments as $comment)
        <div class="row gx-0  py-2">
            <div class="col-10">
                <span class="small fw-bold">{{  $comment->user->name }}</span>
                &nbsp;
                <span class="small texy-secondary">{{ $comment->created_at }}</span>
                <p class="mb-0">{{ $comment->body }}</p>
            </div>
            <div class="col-2 text-end">
                @if($comment->user_id === Auth::user()->id)
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete comment"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                @endif
            </div>
        </div>
     @endforeach
   </div>
@endif
@endsection