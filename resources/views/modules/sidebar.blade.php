
<div class="list-group sidebar-cus">
  <a class="list-group-item list-group-item-action">
    <div class="alert alert-primary " role="alert">
      <h4 align="center">CATAGORY</h4>
    </div>
  </a>

  @if(Request::route()->getName()=='user.post' || Request::route()->getName()=='catagoryauth' )
  @foreach(App\Catagory::orderby('id','asc')->get() as $catagory)
  <a href="{{route('catagoryauth',$catagory->id)}}" class="list-group-item list-group-item-action <?php if(\Request::url() == route('catagoryauth',$catagory->id) ){echo 'active';} ?>">{{$catagory->name}}</a>
  @endforeach
  @else
  <a href="{{route('post.all')}}" class="list-group-item list-group-item-action  <?php if(\Request::url()== route('post.all') ){echo 'active';} ?>">
    All Post
  </a>
  @foreach(App\Catagory::orderby('id','asc')->get() as $catagory)
  <a href="{{route('catagory',$catagory->id)}}" class="list-group-item list-group-item-action <?php if(\Request::url() == route('catagory',$catagory->id) ){echo 'active';} ?>">{{$catagory->name}}</a>
  @endforeach
  @endif


</div>
