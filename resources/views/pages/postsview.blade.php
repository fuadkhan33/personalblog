@extends('layouts.masternosidebar')
@section('content')
  <div class="row justify-content-center">
      <div class="col-md-10 ">
        @include('modules.postscard')
      </div>
  </div>
  <div class="row cus-card-width justify-content-center">
      <div class="col-md-10 ">
        @include('modules.comments')

      </div>

  </div>
  <div class="row cus-comments-width justify-content-center">
      <div class="col-md-10 ">
        @include('modules.commentbox')

      </div>

  </div>


@endsection
