
@extends('layouts.master')
@section('content')
@foreach($posts as $post)

@include('modules.postscard')

@endforeach

@endsection
