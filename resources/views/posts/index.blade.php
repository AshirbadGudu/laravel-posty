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
        <x-post :post="$post" />
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