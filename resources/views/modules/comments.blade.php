
    @foreach ($post->comments as $comment)
    <div class="card">
      <div class="card-header">
        <h5>{{App\Users::find($comment->user_id)->get()->first()->first_name.' '.App\Users::find($comment->user_id)->get()->first()->last_name}}</h5>
      </div>
      <div class="card-body">
        <a href="{{route('profile.view',$post->user_id)}}"> <h6 class="card-subtitle mb-2 text-muted">User Name : <?php $user = App\Users::find($comment->user_id)->get()->first(); echo $user->user_name;
         ?></h6></a>
        <p class="card-text">{{$comment->text}}</p>
        @auth
        <a href="{{route('comment.delete',$comment->id)}}" class="card-link"><i class="fas fa-trash">Delete</i></a>
        @endauth

      </div>
      </div>
    @endforeach
