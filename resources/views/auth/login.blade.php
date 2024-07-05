@extends('layout.app')

@section('content')

<form method="POST" action="{{route('login.store')}}" class="row flex-col mx-auto justify-content-center align-items-center" style="width :  300px ">
    @csrf
    @if (session('creds'))

    <div class=" text-white bg-danger mb-3 p-2 text-center" >
        {{session('creds')}}
    </div>

    @endif
    <div class="mb-3 ">
        <label  class="form-label">Email address</label>
          <input type="email" name="email" class="form-control"  placeholder="Enter Your Email">
        </div>
      <div class="mb-3 ">
        <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
        </div>
        <div style="margin-left: 150px">
            <button  type="submit" class="btn btn-primary">Sign In</button>
          </div>
</form>

@endsection
