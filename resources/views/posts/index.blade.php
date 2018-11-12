@extends('layouts.default')

@section('title','BBS')

@section('content')
    @include('posts.new')
    <hr>
    @foreach ($posts as $post)
        <p>{{ $post->id }}.　投稿[{{ $post->created_at }}]
            <button>
                {{ __('返信')}}
            </button>
            <button>
                {{ __('削除')}}
            </button>
        </p>
        <p>{{ $post->comment }}</p>
    @endforeach
@endsection
