@extends('layout.app')

@section('content')
<div class="container">

    <form method="POST" action="{{route('register.store')}}" class="row flex-col mx-auto justify-content-center align-items-center" style="width :  300px ">
        @csrf
        <div class="mb-3 ">
          <label  class="form-label">Name</label>
            <input type="text" name="name" class="form-control"  placeholder="Enter Your Name">
          </div>
          @error('name')

          <div class=" text-danger">
               {{$message}}
          </div>

          @enderror
        <div class="mb-3 ">
          <label  class="form-label">Email address</label>
            <input type="email" name="email" class="form-control"  placeholder="Enter Your Email">
          </div>
          @error('email')

          <div class=" text-danger">
               {{$message}}
          </div>

          @enderror
        <div class="mb-3 ">
          <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
          </div>
          @error('password')

          <div class=" text-danger">
               {{$message}}
          </div>

          @enderror
        <div class="mb-3 ">
          <label  class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control"  placeholder="Repeat your password">
          </div>
          @error('password_confirmation')

          <div class=" text-danger">
               {{$message}}
          </div>

          @enderror

          <div style="margin-left: 150px">
            <button  type="submit" class="btn btn-primary">Register</button>
          </div>


        </form>
</div>

@endsection
