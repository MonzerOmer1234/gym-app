@extends('layout.app')
@section('content')

  <h3 class=" text-center text-primary">Add  a new Expense</h3>
  <div class="container">
   <form action="{{route('store-expense')}}" method="POST" class="row" style="width :  300px , gap: 10px ">
    @csrf

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Name</label>
                @error('name')

                <div class=" text-danger">
                    {{$message}}
                  </div>
                  @enderror
                  <input type="text" name="name" class="form-control" placeholder="Enter Expense Name">
                </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Amount</label>
                @error('amount')

                <div class=" text-danger">
                    {{$message}}
                  </div>
                  @enderror
                  <input type="number"  name="amount" min="0" class="form-control" placeholder="Enter Amount">
                </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">date</label>
                @error('date')

                <div class=" text-danger">
                     {{$message}}
                </div>
                @enderror
                  <input type="date" name="date" class="form-control" >


                    </div>


            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Type</label>
                @error('type')

                <div class=" text-danger">
                     {{$message}}
                </div>
                @enderror
                <select class="form-select" name="type" aria-label="Default select example">
                    <option value="Select A Type" selected>Select A Type</option>
                    <option value="Fixed" >Fixed</option>
                    <option value="Test">Test</option>


                  </select>
                </div>


            <div class="position-relative">
                    <button  type="submit" class="btn btn-primary position-absolute" style="left:50%; transform:translateX(-50%)">Create An Expense</button>
                  </div>




   </form>
</div>
@endsection
