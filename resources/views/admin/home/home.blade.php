@extends('layout/navbar')


@section('content')
<div class="card" style="width: 18rem;" padding-left="20%">
  <div class="card-body">
    <h5 class="card-title">Profile</h5>
    <p class="card-text">Name: {{$name}}</p>
  
    <a href="/app/adminedit" class="btn btn-primary">Edit Profile</a>
  </div>
</div>

@endsection

@section('title')
Home Page
@endsection

