@extends('layouts.app')
{{-- https://github.com/codecourse/posty-traversy-media/blob/master/resources/views/posts/index.blade.php --}}
@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        {{-- https://youtu.be/MFh0Fd7BsjE?t=4885 --}}


        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="title" class="sr-only">title</label>
                <input name="title" id="title" cols="30" rows="4"
                    class="bg-gray-100 mb-3 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                    placeholder="Post Title!"></input>

                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Post something!"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
            </div>
        </form>

        @if ($posts->count())
        {{$posts->count()}}
        @foreach ($posts as $post)
        <div class="mb-4">
            <h1>{{$post->title}}</h1>
            <a href="" class="font-bold">{{$post->user->name}}</a> <span
                class="text-gray-600">{{$post->created_at->diffForHumans()}}</span>
            <p class="mb-2">{{$post->body}}</p>

        </div>
        @endforeach
        {{ $posts->links()}}
        @else
        Nie ma jesczes żadnych postów
        @endif
    </div>

</div>
@endsection
