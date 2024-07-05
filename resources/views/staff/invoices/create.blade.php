@extends('layout.app')

@section('content')
<div class="container">


<div class="card" style="height:800px">

    <div class="card-header">
       <h1 class=" text-center fw-bold">Money Receipt</h1>
    </div>
    <div class="card-body">
      <h5 class="card-title text-center text-primary">Add a new Invoice</h5>
      <form action="{{ route('store-invoice') }}" method="POST" class="row" style="width :  300px , gap: 10px ">
        @csrf
        <div class="mb-3 col-12">
            <label class="form-label">Member ID</label>
            @error('member_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" name="member_id" value="{{ $member->id}}" class="form-control" readonly>


        </div>
        <div class="mb-3 col-12 ">
            <label class="form-label">Member Name</label>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="text" name="name" value="{{$member->name}}" class="form-control">


        </div>


        <div class="mb-3 col-12">
            <label class="form-label">Start Date</label>
            @error('start_date')
                <div class=" text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="date" name="start_date" value="{{$member->start_date}}" class="form-control">


        </div>
        <div class="mb-3 col-12">
            <label class="form-label">End Date</label>
            @error('end_date')
                <div class=" text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="date" name="end_date" value="{{$member->end_date}}" class="form-control">


        </div>
        <div class="mb-3 col-12">
            <label class="form-label">Amount</label>
            @error('amount')
                <div class=" text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="number" min="0" name="amount" value="{{$member->amount}}" class="form-control">


        </div>
        <div class="mb-3 col-12">
            <label class="form-label">Fee Type</label>
            @error('fee_type')
                <div class=" text-danger">
                    {{ $message }}
                </div>
            @enderror
            <select class="form-select" name="fee_type" aria-label="Default select example">
                <option selected>Select A fee type</option>
                <option value="admission Fee ">Admission Fee</option>
                <option value="Monthly Fee">Monthly Fee</option>
                <option value="Package Fee"> Package Fee</option>


              </select>


        </div>
        <div class="mb-3 col-12">
            <label class="form-label">Payment Type</label>
            @error('payment_type')
                <div class=" text-danger">
                    {{ $message }}
                </div>
            @enderror
            <select class="form-select" name="payment_type" aria-label="Default select example">
                <option selected>Select A Payment type</option>
                <option value="Banking App">Banking App</option>
                <option value="Cash">Cash</option>



              </select>


        </div>






        <div class="position-relative">
            <button type="submit" class="btn btn-primary position-absolute end-0 me-2"
                style="">Create An Invoice</button>
        </div>




    </form>

    </div>
  </div>
</div>



    <div class="container">



    </div>
@endsection
