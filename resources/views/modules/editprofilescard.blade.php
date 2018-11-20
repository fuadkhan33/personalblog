<div class="card cus-profile-margin">
  @if(Auth::User()->image==null)
  <img src="{{asset('usersimage/avatar.jpg')}}" class="rounded mx-auto d-block cus-profile-card-image" alt="profile_image">
  @else
  <img src="{{asset(Auth::User()->image)}}" class="rounded mx-auto d-block cus-profile-card-image" alt="profile_image">
  @endif
  <h5 class="card-header cus-profile-card-header">{{Auth::User()->user_name}}</h5>

  <div class="card-body">
    <h5 class="card-title">{{Auth::User()->first_name.' '.Auth::User()->last_name}}</h5>
    <p class="card-text"><b>Email:</b> {{Auth::User()->email}}</p>
    <p class="card-text"><b>Phone:</b> {{Auth::User()->phone_number}}</p>
    <p class="card-text"><b>Created At:</b> {{Auth::User()->created_at}}</p>
  </div>
</div>
