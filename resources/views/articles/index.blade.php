@extends('layouts.app')

@section('content')
    @foreach ($articles as $article)
        {{$article}}
    @endforeach
@endsection
