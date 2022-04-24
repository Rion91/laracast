@extends('MasterLayout.authLayout')
@section('content')
<form action="{{ route('register.store') }}" method="post">
  @csrf 
    <div class="container">
        <h1 class="text-center">Register here</h1>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Username</label>
            <input type="text" placeholder="username" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" placeholder="example@gmail.com" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          @error('email')
            <p>{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>
</form>
<div class="container"> 
  <a href="{{ route('login.index') }}">
    If you already have an account Sign in here.
  </a>
</div>

@endsection