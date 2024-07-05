@extends('layout.app')


@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-5">

            <h1>Members List</h1>
            <a href="{{ route('create-member') }}" class="btn btn-primary text-center"
                style="width : 100px ; height: 50px; line-height : 40px">Create</a>
        </div>


        <table class="table overflow-x-auto">
            <thead>
                <tr>
                    <th scope="col" class="  text-center">Member ID</th>
                    <th scope="col" class="  text-center">Member Name</th>
                    <th scope="col" class="  text-center">Member Photo</th>
                    <th scope="col" class="  text-center">Created by</th>
                    <th scope="col" class="  text-center">mobile</th>
                    <th scope="col" class="  text-center">card number</th>
                    <th scope="col" class="  text-center">status</th>
                    <th scope="col" class="  text-center">Available exercises</th>
                    <th scope="col" class="  text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <th class="text-center" scope="row" style="line-height: 100px">{{ $member->id }}</th>
                        <td class="text-center" style="line-height: 100px ; white-space:nowrap">{{ $member->name }}</td>
                        <td class="text-center">
                            <img src="/storage/member/photo/{{ $member->photo }}" width="100px" height="100px"
                            class="text-center" alt="member {{ $member->id }} photo" class=" rounded"></td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $member->user->name }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $member->mobile }}</td>
                        <td class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $member->card_no }}</td>
                        <td class="text-center" class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $member->status }}</td>
                        <td class="text-center" class="text-center" style="line-height : 100px ; white-space:nowrap">{{ $member->available_exercises }}</td>

                        <td style=" white-space:nowrap">
                            <div class="row flex-column align-items-center">

                                <a type="button" class="btn btn-success mb-3"
                                style="width : fit-content ; margin : 0 auto"
                                    href="{{ route('show-member', $member->id) }}">Show</a>
                                    @can('update', $member)
                                    <a type="button" class="btn btn-primary mb-3 "
                                    href="{{ route('edit-member', $member->id) }}"
                                    style="width : fit-content ; margin : 0 auto"
                                    >Edit
                                </a>
                                <a type="button" class="btn bg-black text-white mb-3"
                                style="width : fit-content ; margin : 0 auto"
                                    href="{{ route('create-invoice', $member->id) }}">Create Money receipt</a>

                                <form class=" d-flex" action="{{ route('delete-member', $member->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-3 "
                                    style="width : fit-content ; margin : 0 auto">Delete</button>
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
