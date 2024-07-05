@extends('layout.app');

@section('content')

<div style="width:100vw ; height : 100vh">

    <div class=" d-flex justify-content-center align-items-center ">
        <div class="card" style="width: 18rem;border:none">

            <div class="card-body">
              <h5 class="card-title text-center">Name : {{$expense->name}}</h5>
              <p class="card-text text-center">
                <span class=" d-block"> Amount  : {{$expense->amount}}</span>
                <span class=" d-block"> Date : {{$expense->date}}</span>
                <span class=" d-block ">  Type : {{$expense->type}}</span>

              </p>
              <a href="{{route('expenses-data')}}" class="btn btn-primary ms-5">Go To all Expenses</a>
            </div>
          </div>

    </div>

</div>

@endsection
