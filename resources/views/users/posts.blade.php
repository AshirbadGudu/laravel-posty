@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12">
        <div class="p-6">
            <h1 class="text-2xl font-medium">{{$user->name}}</h1>
            <p>
                Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}}
                and recieved {{$user->receivedLikes()->count()}}
                {{Str::plural('like', $user->receivedLikes()->count())}}
            </p>
        </div>
        <div class=" bg-white p-6 rounded-lg">
            @if ($posts->count())
            @foreach ($posts as $post)
            <x-post :post="$post" />
            @endforeach
            @else
            <div class="bg-red-400 py-3 rounded-lg text-center text-white mb-4">
                {{$user->name}} does not have any posts.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection