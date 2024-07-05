@extends('layout.app')
@section('content')

  <h3 class=" text-center text-success">Edit Expense</h3>
  <div class="container">
   <form action="{{route('update-expense' , $expense->id)}}"  method="POST" class="row" style="width :  300px , gap: 10px ">


    @csrf
    @method('PUT')

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Name</label>
                @error('name')

                <div class=" text-danger">
                    {{$message}}
                  </div>
                  @enderror
                  <input type="text" value="{{$expense->name}}" name="name" class="form-control" placeholder="Enter Expense Name">
                </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Amount</label>
                @error('amount')

                <div class=" text-danger">
                    {{$message}}
                  </div>
                  @enderror
                  <input type="number" value="{{$expense->amount}}"  name="amount" class="form-control" placeholder="Enter Amount">
                </div>


            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Date</label>
                @error('date')

                <div class=" text-danger">
                     {{$message}}
                </div>
                @enderror
                  <input type="date" value="{{$expense->date}}" name="date" class="form-control" placeholder="Enter Date">
                </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Type</label>
                @error('type')

                <div class="text-danger">
                     {{$message}}
                </div>
                @enderror
                <select class="form-select" name="type" aria-label="Default select example">
                    <option @selected($expense->type === "Select A Type")>Select A Type</option>
                    <option @selected($expense->type === "Fixed") value="Fixed">Fixed</option>
                    <option @selected($expense->type === "Test")  value="Test">Test</option>


                  </select>
                </div>




            <div class="position-relative">
                    <button  type="submit" class="btn btn-primary position-absolute" style="left:50%; transform:translateX(-50%)">Update An expense</button>
                  </div>




   </form>
</div>
@endsection
