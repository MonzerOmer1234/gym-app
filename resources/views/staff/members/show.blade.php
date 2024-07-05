@extends('layout.app');

@section('content')

<div style="width:100vw ; height : 100vh">

    <div class=" d-flex justify-content-center align-items-center ">
        <div class="card" style="width: 18rem;border:none">
            <img src="/storage/member/photo/{{$member->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">{{$member->name}}</h5>
              <p class="card-text text-center">
                <span class=" d-block"> Mobile  : {{$member->mobile}}</span>
                <span class=" d-block"> Address : {{$member->address}}</span>
                <span class=" d-block">Enrolled exercise : {{$member->available_exercises}}</span>
                <span class=" d-block ">Start Date : {{$member->start_date}}</span>
                <span class=" d-block">End Date : {{$member->end_date}}</span>
                <span class=" d-block">Card Number : {{$member->card_no}}</span>
                <span class=" d-block">Supervised by : {{$member->user->name}}</span>
              </p>
              <a href="{{route('members-data')}}" class="btn btn-primary ms-5">Go To all members</a>
            </div>
          </div>

    </div>

</div>

@endsection
