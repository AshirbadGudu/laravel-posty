@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-white p-6 rounded-lg">
        @if (session('status'))
        <div class="bg-red-500 py-3 rounded-lg text-center text-white mb-4">
            {{session('status')}}
        </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input value="{{old('email')}}" type="email" id="email" name="email" placeholder="Enter your email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('email') border-red-500 @enderror
                    ">
                @error('email')
                <div class="text-red-500 mt-2 text-small">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('password') border-red-500 @enderror
                    ">
                @error('password')
                <div class="text-red-500 mt-2 text-small">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="">Remember me</label>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 rounded text-white px-4 py-3 font-medium w-full">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection