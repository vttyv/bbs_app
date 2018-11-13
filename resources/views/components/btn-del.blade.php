<form style="display:inline" action="{{ $action }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        {{ __('削除')}}
    </button>
</form>
