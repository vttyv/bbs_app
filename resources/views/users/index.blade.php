@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <p>ユーザー：{{$user}}
        @component('components.btn-del')
            @slot('action')
                users/{{$user->id}}
            @endslot
        @endcomponent
        </p>
        @if( $user->articles()->first() )
            <p>投稿：{{ $user->articles()->orderBy('id','dsc')->get()}}</p>
        @endif
    @endforeach
@endsection
