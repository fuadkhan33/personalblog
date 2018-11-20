@extends('layouts.editprofilemaster')

@section('content')
<div class="container user-form-cus">
    <div class="row justify-content-center">
      <div class="col-md-4">
        @include('modules.editprofilescard')
      </div>
        <div class="col-md-8">
            @include('modules.editprofileform')
        </div>
    </div>
</div>
@endsection
