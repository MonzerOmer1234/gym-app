@extends('layout.app')


@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-5">

            <h1>Invoices List</h1>

        </div>


        <table class="table overflow-x-auto">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Invoice No.</th>
                    <th class="text-center" scope="col">Member ID</th>
                    <th class="text-center" scope="col">Member Name</th>
                    <th class="text-center" scope="col">Mobile</th>
                    <th class="text-center" scope="col">Start Date</th>
                    <th class="text-center" scope="col">End Date</th>
                    <th class="text-center" scope="col">Fee Type</th>
                    <th class="text-center" scope="col">Payment Type</th>
                    <th class="text-center" scope="col">Created By</th>
                    <th class="text-center" scope="col"> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <th class="text-center" scope="row" style="line-height: 100px">{{ $invoice->id }}</th>
                        <td class="text-center" style="line-height: 100px ; white-space:nowrap">{{ $invoice->member->id }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $invoice->member->name }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $invoice->member->mobile }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{  $invoice->start_date }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{  $invoice->end_date }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $invoice->fee_type }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $invoice->payment_type }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $invoice->user->name }}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-center align-items-center">

                                <a href="{{route('show-invoice' , $invoice->id)}}" class= "btn btn-primary btn-sm" style="margin: 10px auto 0">View</a>

                                <form action="{{route('delete-invoice' , $invoice->id) }}" method="POST" style="margin-top:20px">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-3 btn-sm " style="width:fit-content;height:0 auto">Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>



    </div>
@endsection
