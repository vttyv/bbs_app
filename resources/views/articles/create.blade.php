@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">投稿フォーム</div>
                <div class="card-body">
                    <form action="/articles" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @if ($errors->has('images'))
                            <p class="text-danger">{{ __($errors->first('images')) }}</p>
                        @endif
                        <div class="form-group">
                            <label class="pr-2" for="title">タイトル</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <div class="text-area-block">
                                <textarea rows="4" placeholder="説明やコメントを入力..." class="form-control" name="descript"></textarea>
                            </div>
                        </div>
                        <div class="form-group container-form" id="app">
                            <div class="item">
                                <label class="btn btn-primary" >＋画像を選択
                                    <input type="file" @change="selectedFile" name="images" style="display:none" multiple/>
                                </label>
                                <button class="btn btn-success" name="action" type="submit" value="send">送信</button>

                                <p>投稿のサムネイル</p>
                                <div v-if="images.length">
                                    <div class="photo-frame-img">

                                    <croppa v-model="croppa"
                                        disable-click-to-choose
                                        placeholder="click button on the right :)"
                                        :placeholder-font-size="14"
                                        :zoom-speed="10"
                                        :show-remove-button="false"
                                        @zoom="handleCroppaZoom">
                                        <img slot="initial" :src="thumbnail" />
                                    </croppa>

                                    </div>
                                </div>

                                <div v-else>
                                    <div class="photo-frame-thumbnail">
                                        thumbnail image.
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div v-if="images.length > 0">
                                    <div v-for="image in images">
                                        <div class="item photo-frame-img">
                                            <img :src="image" />
                                            <div class="btn btn-success" @click="selectedThumbnail(image)">サムネ</div>
                                            <div class="btn btn-danger" @click="deletedImage(image)">削除</div>
                                        </div>
                                    </div>
                                    <label class="item photo-frame-input">
                                            <input type="file" @change="selectedFile" name="images" style="display:none" multiple/>
                                        <p class="photo-frame-text">select image.</p>
                                    </label>
                                </div>
                                <div v-else>
                                    <label class="item photo-frame-input">
                                        <input type="file" @change="selectedFile" name="images" style="display:none" multiple/>
                                        <p class="photo-frame-text">select image.</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
