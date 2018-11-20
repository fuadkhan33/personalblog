@foreach($users as $user)
<div class="card cus-profile-margin">
  @if($user->image==null)
  <img src="{{asset('usersimage/avatar.jpg')}}" class="rounded mx-auto d-block cus-profile-card-image" alt="profile_image">
  @else
  <img src="{{asset($user->image)}}" class="rounded mx-auto d-block cus-profile-card-image" alt="profile_image">
  @endif
  <h5 class="card-header cus-profile-card-header">{{$user->user_name}}</h5>

  <div class="card-body">
    <h5 class="card-title">{{$user->first_name.' '.$user->last_name}}</h5>
    <p class="card-text"><b>Email:</b> {{$user->email}}</p>
    <p class="card-text"><b>Phone:</b> {{$user->phone_number}}</p>
    @auth
    <p class="card-text"><b>Created At:</b> {{$user->created_at}}</p>
    @endauth
  </div>
</div>
@endforeach
