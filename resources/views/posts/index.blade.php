@extends('layouts.app')

@section('content')
 <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        Posts

        <form action="{{ route('posts.store') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Email</label>
                <textarea id="body" name="body" placeholder="Post Something" cols="30" rows="4" value=""
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"></textarea>

                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
            </div>
        </form>
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="" class="font-bold">{{ $post->user->name }}</a> <span class="test-gray-600 text-sm">{{ $post->created_at }}</span>
                    <p class="mb-2">{{ $post->body }}</p>
                </div>
            @endforeach
        @else
            <p>There are no posts</p>
        @endif
    </div>
 </div>
@endsection
