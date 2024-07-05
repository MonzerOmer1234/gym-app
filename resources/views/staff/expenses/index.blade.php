@extends('layout.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-5">

        <h1>Expenses List</h1>
        <a href="{{route('create-expense')}}" class="btn btn-primary text-center" style="width : 100px ; height: 50px; line-height : 40px">Create</a>
    </div>

    <table class="table overflow-x-auto">
        <thead>
          <tr>

            <th scope="col" class= "text-center">Title</th>
            <th scope="col" class= "text-center">Amount</th>
            <th scope="col" class= "text-center">Type</th>
            <th scope="col" class= "text-center">Date</th>
            <th scope="col" class= "text-center">Created By</th>
            <th scope="col" class= "text-center">Actions</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
            <tr>

              <td class="text-center" style="line-height: 100px ; white-space:nowrap">{{$expense->name}}</td>
              <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{$expense->amount}}</td>
              <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{$expense->type}}</td>
              <td  class="text-center" style="line-height : 100px ; white-space:nowrap">{{$expense->date}}</td>

              <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{$expense->user->name}}</td>
              <td class="text-center" style="line-height: 100px ; white-space:nowrap">
                <div class="row flex-column ">
                    <a type="button" class="btn btn-success mb-3" style="width: fit-content ; margin:0 auto" href="{{route('show-expense', $expense->id)}}">Show</a>
                   @can('update', $expense)

                   <a type="button" class="btn btn-primary mb-3" style="width: fit-content ; margin:0 auto" href="{{route('edit-expense' , $expense->id)}}">Edit</a>

               <form action="{{route('delete-expense' , $expense->id) }}" method="POST" class=" d-flex justify-content-center">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger mb-3 " style="width:fit-content;height:0 auto">Delete</button>
               </form>
                   @endcan
                </div>
              </td>
            </tr>

            @endforeach

        </tbody>
      </table>



</div>


@endsection
