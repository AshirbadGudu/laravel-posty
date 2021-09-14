@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach
        @else
        <div class="bg-red-400 py-3 rounded-lg text-center text-white mb-4">
            There are no posts available
        </div>
        @endif
    </div>
</div>
@endsection