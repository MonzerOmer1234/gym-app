@extends('layout.app')

@section('content')
    <div class="container" style="height : 100vh">

        <div class="card  " style="width: 18rem; margin:0 auto">
            <div class="card-body">
                <h1 class="card-title text-center">GYM FITNESS</h1>
                <h6 class="card-subtitle mb-2 text-body-secondary">126/F/1 1st Floor, above State Bank Of India, near Chaddha
                    Sweet House, Govind Nagar, Kanpur, Uttar Pradesh 208006, India
                    <span class=" d-block mt-3">Call : <b>0123456789</b></span>
                </h6>
                <p class="card-text">
                <h3>Money Receipt</h3>
                <p class=" text-sm">Office Copy</p>

                <p>
                    <span class=" d-block">Invoice No . <b>{{ '#' . $invoice->id }}</b></span>
                    <span class="d-block">Date : <b class=" text-decoration-underline">

                            @php
                                echo date(now());
                            @endphp
                        </b>
                    </span>

                <p>Received with thanks from <b>{{ $invoice->user->name }}</b> . MemberID : {{ $invoice->member->id }}

                and Contact no : {{$invoice->member->mobile}} on Amount {{$invoice->amount}} . Take only by <b>{{$invoice->payment_type}}</b>

                Purpose of <b>{{$invoice->fee_type}}</b> of duration Period from <b>{{$invoice->start_date}}</b> to <b>{{$invoice->end_date}}</b>
                </p>

                </p>

                </p>
                 <div class=" d-flex flex-col gap-3">

                  <div>

                  <p class=" text-center text-success fw-bold fs-4">Thanks for enrollment</p>


                  </div>
                  <div>

                  </div>

                 </div>
            </div>
        </div>
        <div class=" position-relative mt-4">
            <a href="{{route('invoices-data')}}" class="btn btn-primary position-absolute" style="left:50% ; transform : translateX(-50%)">Go Back to all invoices</a>

        </div>
    </div>
@endsection
