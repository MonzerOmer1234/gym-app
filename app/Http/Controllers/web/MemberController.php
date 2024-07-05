<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\MemberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Member;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Stringable;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        //
        $members = Member::all();
        return view('staff.members.index' , ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create()
    {
        //
        return view('staff.members.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request
     * @return Response
     *
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'mobile' => 'required | max:11',
            'blood_group' => 'required',
            'address' => 'required',
            'photo' => 'required | image',
            'start_date' => 'required',
            'end_date' => 'required',
            'card_no' => 'required',
            'available_exercises' => 'required',
            'status' => 'required',

        ]);
        $photoName = Str::random().".". $request->photo->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('member/photo' , $request->photo , $photoName);


        Member::create($request->post() + ['photo' => $photoName , "created_by" => auth()->user()->id]);

        Mail::to(auth()->user()->email)->send(new MemberMail(['name'=> auth()->user()->name , 'message' => 'Check Your new Members']));

        return redirect()->route('members-data');
     }



    /**
     * Display the specified resource.
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {
        //
        $member = Member::find($id);
        return view('staff.members.show' , ['member' => $member] );
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        //
        $member = Member::find($id);
        Gate::authorize('update' , $member);
        return view('staff.members.edit' , ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request
     * @param string $id
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        //
        $member = Member::find($id);
        Gate::authorize('update' , $member);
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'mobile' => 'required | max:11',
            'blood_group' => 'required',
            'address' => 'required',
            'photo' => 'nullable',
            'start_date' => 'required',
            'end_date' => 'required',
            'card_no' => 'required',
            "available_exercises" => 'required',
            'status' => 'required',

        ]);
        $member->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'mobile' =>$request->mobile,
            'blood_group' => $request->blood_group,
            'address' =>$request->address,
            'available_exercies' => $request->available_exercises,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'card_no' =>$request->card_no,
            "available_exercises" => $request->available_exercises,
            'status' => $request->status,

        ]);

        if($request->hasFile('photo')){

            if ($member->photo) {
                $exist = Storage::disk('public')->exists("member/photo/{$member->photo}");

                if ($exist) {
                    Storage::disk('public')->delete("member/photo/{$member->photo}");
                }
            }
        }
        $photoName = Str::random() . "." . $request->photo->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('member/photo', $request->photo, $photoName);

        $member->photo = $photoName;
        $member->save();
        return redirect()->route('members-data');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return Response
     */
    public function destroy(string $id)
    {
        //

        $member = Member::find($id);
        Gate::authorize('delete' , $member);
        $member->delete();
        return to_route('members-data');
    }
}
