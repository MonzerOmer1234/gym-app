@extends('layout.app')
@section('content')
    <h3 class=" text-center text-primary">Add a new member</h3>
    <div class="container">
        <form action="{{ route('store-member') }}" enctype="multipart/form-data" method="POST" class="row"
            style="width :  300px , gap: 10px ">
            @csrf

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Name</label>
                @error('name')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Mobile Number</label>
                @error('mobile')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">gender</label>
                @error('gender')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <select class="form-select" name="gender" aria-label="Default select example">
                    <option value="Select A gender" selected>Select A gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>


                </select>
            </div>

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                @error('blood_group')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <label class="form-label ">Blood group</label>
                <select class="form-select" name= "blood_group" aria-label="Default select example">
                    <option value="Select a blood group" selected>Select a blood group</option>
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">B+</option>
                    <option value="4">B-</option>
                    <option value="5">AB+</option>
                    <option value="6">AB-</option>
                    <option value="7">O+</option>
                    <option value="8">O-</option>


                </select>
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Address</label>
                @error('address')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" name="address" class="form-control" placeholder="Enter Your Address">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Avatar</label>
                @error('photo')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="file" name="photo" class="form-control" id="inputGroupFile02">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Start Date</label>
                @error('start_date')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="date" name="start_date" class="form-control" placeholder="Enter Your Start Date">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">End Date</label>
                @error('end_date')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="date" name="end_date" class="form-control" placeholder="Enter Your end date">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Card No.</label>
                @error('card_no')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" name="card_no" class="form-control" placeholder="Enter Your card number">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Available Exercises (choose one exercise)</label>
                @error('available_exercises')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror

                    <select class="form-select" name= "available_exercises" aria-label="Default select example">
                        <option value="Select an exercise" selected>Select an exercise</option>
                        <option value="Squat">Squat</option>
                        <option value="Leg Press">Leg Press</option>
                        <option value="Deadlift">Deadlift</option>
                        <option value="Lunge">Lunge</option>
                


                    </select>


            </div>

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Status</label>
                @error('status')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="Select A status" selected>Select A status</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Active">Active</option>


                </select>

            </div>
            <div class="position-relative">
                <button type="submit" class="btn btn-primary position-absolute"
                    style="left:50%; transform:translateX(-50%)">Create A member</button>
            </div>




        </form>
    </div>
@endsection
