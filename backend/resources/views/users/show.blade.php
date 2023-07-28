@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="row mt-2 mb-5">
        <div class="col-4">
            @if($user->avatar)
               <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}" class="img-thumbnail w-100">
            @else
             <i class="fa-solid fa-image fa-10x d-block text-center"></i>
            @endif
        </div>
        <div class="col-8">
            <h2 class="display-6">{{ $user->name }}</h2>
            <a href="{{ route('profile.edit') }}" class="text-decoration-none">Edit Profile</a>
        </div>  
    </div>
    {{-- Show all posts of the user --}}
    @if($user->posts)
       <ul class="list-group mb-5">
         @foreach($user->posts as $post)
            <li class="list-group-item py-4">
                <a href="{{ route('post.show', $post->id) }}">
                    <h3 class="h4">{{ $post->title }}</h3>
                </a>
                <p class="fw-light mb-0">{{ $post->body }}</p>
            </li>
            @endforeach
       </ul>
    @endif
@endsection

