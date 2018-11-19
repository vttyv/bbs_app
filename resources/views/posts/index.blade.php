@extends('layouts.app')

@section('content')
    @component('posts.new')
        @slot('action')
            create/x
        @endslot
    @endcomponent
    <hr>
    @foreach ($posts as $post)
        @if ($post->post_id != NULL )
            @continue
        @endif
        <p style="display:inline">{{ $post->id }}. 名前:{{ App\User::find($post->user_id)->name }}  投稿時間[{{ $post->created_at }}] ID:{{ $post->fixed_id}} </p>

        <!-- 切り替えボタンの設定 -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reply-{{ $post->id }}">返信</button>

        <!-- モーダルの設定 -->
        <div class="modal fade" id="reply-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="reply-{{ $post->id }}-Label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reply-{{ $post->id }}-Label">投稿{{ $post->id}}.への返信</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{'create/'.$post->id}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <textarea id="comment" name="comment" value="" rows="10" cols="55"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="action" type="submit" value="send">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @auth
            @if ( $post->user_id == \Auth::user()->id )
                @component('components.btn-del')
                    @slot('action')
                        {{'delete/'.$post->id}}
                    @endslot
                @endcomponent
            @endif
        @endauth



        @if ( $post->post_id!=NULL)
            <p class="text-danger">{{ $post->post_id }}へのコメント</p>
        @endif
        <p>{{ $post->comment }}</p>
        @if ( count($posts->where('post_id', $post->id)))
            <p class="text-primary">---コメント{{ count($posts->where('post_id', $post->id)) }}件あり---</p>
            @foreach ( $posts->where('post_id', $post->id) as $micropost)
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <p style="display:inline; padding-right:25px">{{ $micropost->id }}. 名前:{{ App\User::find($micropost->user_id)->name }}  投稿時間[{{ $micropost->created_at }}] ID:{{ $micropost->fixed_id}} </p>
                            @auth
                                @if ( $micropost->user_id == \Auth::user()->id )
                                    @component('components.btn-del')
                                        @slot('action')
                                            {{'delete/'.$micropost->id}}
                                        @endslot
                                    @endcomponent
                                @endif
                            @endauth
                        </div>
                        <p class="card-text">{{$micropost->comment}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <hr>
    @endforeach
@endsection
