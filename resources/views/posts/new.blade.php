<form action="{{ $action }}" method="POST">
    @csrf
    @method('POST')
    @if ($errors->has('comment'))
        <p class="text-danger">{{ __($errors->first('comment')) }}</p>
    @endif
    <textarea id="comment" name="comment" value="" rows="10" cols="80"></textarea>
    <button class="btn btn-primary" name="action" type="submit" value="send">送信</button>
</form>
