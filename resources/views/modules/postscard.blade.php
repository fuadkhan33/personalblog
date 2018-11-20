<div class="card-group card-mar-cus">
      <div class="card mb-3 card-mar-cus">
      @if(!empty($post->images))
      @include('modules.postimageslider')
      @endif
        <div class="card-body card-mar-cus">
          <h5 class="card-title card-title-cus "><a href="{{route('post.view',$post->id)}}">{{$post->title}}</a></h5>
           <h6 class="card-subtitle mb-2 text-muted">Posted By : <a href="{{route('profile.view',$post->user_id)}}"><?php $user = App\Users::find($post->user_id)->get()->first(); echo $user->user_name;
           ?></a></h6>
           <h6 class="card-subtitle mb-2 text-muted">At : {{$post->created_at}}</h6>
           @if(\Request::route()->getName()=='post.view')
           <p>{{$post->text}}</p>
           @else
           <p>{{str_limit($post->text,300)}}</p>
           @endif


          <div class="row">
            <div class="col-md-9">
              {{--For authenticate users--}}
              @auth
                {{--Calculate Like or Unlike text--}}
                @if(App\postLikes::where('user_id', '=', Auth::User()->id)->where('post_id','=',$post->id)->count()>=1)
                <a href="{{route('user.post.unlike',$post->id)}}" class="card-link"><i class="fas fa-thumbs-up">Unlike (<?php
                      echo App\postLikes::where('post_id','=',$post->id)->count();

                 ?>)</i></a>
                 <a href="{{route('post.view',$post->id)}}" class="card-link"><i class="far fa-comments"> Comment ({{App\postComments::where('post_id','=',$post->id)->count()}})</i></a>
                 @if(Auth::User()->id==$post->user_id)
                 <a href="{{route('user.post.delete',[$post->id,Auth::User()->id])}}" class="card-link"><i class="far fa-comments"> Delete </i></a>
                 @endif
                @else
                <a href="{{route('user.post.like',$post->id)}}" class="card-link"><i class="fas fa-thumbs-up">Like (<?php
                      echo App\postLikes::where('post_id','=',$post->id)->count();

                 ?>)</i></a>
                 <a href="{{route('post.view',$post->id)}}" class="card-link"><i class="far fa-comments"> Comment ({{App\postComments::where('post_id','=',$post->id)->count()}})</i></a>
                 @if(Auth::User()->id==$post->user_id)
                 <a href="{{route('user.post.delete',[$post->id,Auth::User()->id])}}" class="card-link"><i class="far fa-comments"> Delete </i></a>
                 @endif
                @endif
                {{--End of Calculate Like or Unlike text--}}
                {{--End For authenticate users--}}
               @else
               {{--start For Guest users--}}
               <a href="{{route('user.post.like',$post->id)}}" class="card-link"><i class="fas fa-thumbs-up">Like (<?php
                     echo App\postLikes::where('post_id','=',$post->id)->count();

                ?>)</i></a>
                <a href="{{route('post.view',$post->id)}}" class="card-link"><i class="far fa-comments"> Comment ({{App\postComments::where('post_id','=',$post->id)->count()}})</i></a>

                @endauth


            </div>

          </div>
        </div>
      </div>
  </div>
