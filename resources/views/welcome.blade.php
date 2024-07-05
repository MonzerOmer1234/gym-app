@extends('layout.app')
@section('content')

<div class="container">
    <div class=" d-flex mt-5 flex-column justify-content-center align-items-center gap-4">
        <h1 class=" text-center">Hello , Welcome to my GYM Fitness</h1>
        <p class=" mt-3 fst-italic text-success fw-medium">This is the best place to practise</p>

        <a href="{{route('members-data')}}" class=" btn btn-primary">Join Us And explore our members</a>
    </div>
</div>

@endsection
