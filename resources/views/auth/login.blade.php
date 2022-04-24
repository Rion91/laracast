@extends('MasterLayout.authLayout')
@section('content')

<div class="container">
  <h1 class="text-center">Login Form</h1>
      <form action="{{ route('login.store') }}" method="POST">
      @csrf
        <div class="col-sm-12 col-md-12">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          @error('email')
            <p class="alert alert-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="col-sm-12 col-md-12">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          @error('password')
            <p class="alert alert-danger">{{ $message }}</p>
          @enderror
        </div>
        {{-- <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <div class="mb-3 text-center" style="margin-top: 10px">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
      <div class="mb-3 text-center" style="margin-top: 10px">
        <a href="{{ route('register.index') }}"><button type="submit" class="btn btn-primary">Register</button></a>
      </div>
</div>

@endsection