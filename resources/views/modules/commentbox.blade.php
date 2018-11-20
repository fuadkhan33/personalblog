
<form method="POST"  action="{{ route('post.comment',$post->id) }}">
  @csrf
<div class="input-group">

  <textarea class="form-control" name="comment" aria-label="With textarea"></textarea>
  <button type="submit" class="btn btn-primary">Comment</button>
</div>
</form>
