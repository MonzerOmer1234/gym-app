@extends('layout.app')
@section('content')
    <h3 class=" text-center text-success">Edit member</h3>
    <div class="container">
        <form action="{{ route('update-member', $member->id) }}" enctype="multipart/form-data" method="POST" class="row"
            style="width :  300px , gap: 10px ">


            @csrf
            @method('PUT')

            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Name</label>
                @error('name')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" value="{{ $member->name }}" name="name" class="form-control"
                    placeholder="Enter Your Name">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Mobile Number</label>
                @error('mobile')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" value="{{ $member->mobile }}" name="mobile" class="form-control"
                    placeholder="Enter Your Mobile">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">gender</label>
                @error('gender')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <select class="form-select" name="gender" aria-label="Default select example">
                    <option @selected($member->gender=== "Select A gender") value="Select A gender">Select A gender</option>
                    <option value="Male" @selected($member->gender=== "Male") >Male</option>
                    <option value="Female" @selected($member->gender=== "Female") >Female</option>


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
                    <option @selected($member->blood_group === "Select a bllod group")>Select a blood group</option>
                    <option value="1" @selected($member->blood_group === "A+")>A+</option>
                    <option value="2" @selected($member->blood_group === "A-")>A-</option>
                    <option value="3" @selected($member->blood_group === "B+")>B+</option>
                    <option value="4" @selected($member->blood_group === "B-")>B-</option>
                    <option value="5" @selected($member->blood_group === "AB+")>AB+</option>
                    <option value="6" @selected($member->blood_group === "AB-")>AB-</option>
                    <option value="7" @selected($member->blood_group === "O+")>O+</option>
                    <option value="8" @selected($member->blood_group === "O-")>O-</option>


                </select>
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Address</label>
                @error('address')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" value="{{ $member->address }}" name="address" class="form-control"
                    placeholder="Enter Your Address">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Avatar</label>
                @error('photo')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="file" name="photo" value="{{$member->photo}}" class="form-control" id="inputGroupFile02">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Start Date</label>
                @error('start_date')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="date" value="{{ $member->start_date }}" name="start_date" class="form-control"
                    placeholder="Enter Your Start Date">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">End Date</label>
                @error('end_date')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="date" value="{{ $member->end_date }}" name="end_date" class="form-control"
                    placeholder="Enter Your end date">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Card No.</label>
                @error('card_no')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <input type="text" value="{{ $member->card_no }}" name="card_no" class="form-control"
                    placeholder="Enter Your card number">
            </div>
            <div class="mb-3 col-12 col-md-3 col-lg-4">
                <label class="form-label">Available Exercises (choose one exercise)</label>
                @error('available_exercises')
                    <div class=" text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <select class="form-select" name= "available_exercises" aria-label="Default select example">
                    <option value="Select an exercise" @selected($member->available_exercises === "Select an exercise")>Select an exercise</option>
                    <option value="Squat" @selected($member->available_exercises === "Squat")>Squat</option>
                    <option value="Leg Press" @selected($member->available_exercises === "Leg Press")>Leg Press</option>
                    <option value="Deadlift" @selected($member->available_exercises === "Deadlift")>Deadlift</option>
                    <option value="Lunge" @selected($member->available_exercises === "Lunge")>Lunge</option>



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
                    <option @selected($member->status === "Select A status")>Select A status</option>
                    <option @selected($member->status === "Inactive") value="Inactive">Inactive</option>
                    <option value="Active" @selected($member->status === "Active")>Active</option>


                </select>
            </div>
            <div class="position-relative">
                <button type="submit" class="btn btn-primary position-absolute"
                    style="left:50%; transform:translateX(-50%)">Update A member</button>
            </div>




        </form>
    </div>
@endsection
