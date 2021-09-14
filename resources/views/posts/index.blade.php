@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @if (session('success'))
        <div class="bg-green-500 py-3 rounded-lg text-center text-white mb-4">
            {{session('success')}}
        </div>
        @endif
        <form action="{{ route('posts')}}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" placeholder="Post something" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body')
                    border-red-500                        
                    @enderror"></textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 rounded text-white px-4 py-3 font-medium w-full">
                Post
            </button>
        </form>
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="mb-4">
            <a href="#" class="font-bold">
                {{ $post->user->name  }}
                <span class="text-gray-500 text-sm">{{$post->created_at->diffForHumans()}}</span>
            </a>
            <p class="mb-4">{{$post->body}}</p>
            @auth()
            <form action="{{ route('posts.delete', $post) }}" method="post" class='mr-1'>
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
            @endauth
            <div class="flex items-center">
                @auth()
                @if ($post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class='mr-1'>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
                @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class='mr-1'>
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
                @endif
                @endauth
                <span>
                    {{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}
                </span>
            </div>
        </div>
        @endforeach
        @else
        <div class="bg-red-400 py-3 rounded-lg text-center text-white mb-4">
            There are no posts available
        </div>
        @endif
        {{-- Creating Pagination --}}
        {{$posts->links()}}
    </div>
</div>
@endsection