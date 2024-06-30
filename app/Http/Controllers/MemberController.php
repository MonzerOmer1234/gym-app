<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\HttpCache\Store;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $members =  Member::all()->paginate(10);
         $success = "the data is received successfully";
         $fail = "facing errors hile fetching data";
        return response([

            'status' => $members ? $success : $fail ,
            'members' => $members,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required | max:50',
            'gender' => 'required',
            'mobile' => 'required | max:11',
            'blood_group' => 'required',
            'address' => 'required',
            'photo' => 'required | image',
        ]);
        $photoName = Str::random().".". $request->photo->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('member/photo' , $request->photo , $photoName);

        $member = Member::create([
            'member_id' => uniqid(),
            'name' => $request->name,
            'gender'=> $request->gender,
            'mobile' =>  $request->mobile,
            'address' =>  $request->address,
            'blood_group' => $request->blood_group,
            'photo' =>  $photoName,
            'created_by' =>  auth()->user()->id,

        ]);
        $member->member_id = date('Y') . str_pad($member->id , 6 , '0' , STR_PAD_LEFT);

        $member->save();
        return response([
            'message' => 'the member is created successfully',
            'member' => $member,
        ]);
     }

    /**
     * Display the specified resource.
     * @param string id
     * @return App\Models\Member
     */
    public function show(string $id)
    {
        //

        $member =  Member::with('user')->find($id);
        if($member){
            return response([
                'message' => 'the member is fetched successfully',
                'member' => $member
            ]) ;
        } else{
            return response([
                'message' => "the member is not found",
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::find($id);
        if($member){
            $request->validate([
                'name' => 'required | max:50',
                'gender' => 'required',
                'mobile' => 'required | max:11',
                'blood_group' => 'required',
                'address' => 'required',
                'photo' => 'nullable',
            ]);
            $member->fill($request->post())->update();
            if($request->hasFile('photo')){
                if($member->photo){
                    $exist = Storage::disk('public')->exists("member/photo/{$member->photo}");
                    if($exist){
                        Storage::disk('public')->delete("mmeber/photo/{$member->photo}");
                    }
                }
                $photoName = Str::random() . "." . $request->photo->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('member/photo', $request->photo, $photoName);


                $member->member_id = date('Y') . str_pad($member->id , 6 , '0' , STR_PAD_LEFT);
                $member->image = $photoName;
                $member->save();
            }
        }
        return response([
            'message' => 'The member is updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return App\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        //
        $member = Member::find($id);

        if($member){
            if($member->photo){
                $exist = Storage::disk('public')->exists("member/photo/{$member->photo}");
                if($exist){
                    Storage::disk('public')->delete("member/photo/{$member->photo}");
                }
            }

            $member->delete();
            return response([
                'message' => 'the member is deleted successfully',
            ]);
        } else{
            return 'the member is not found';
        }

    }
}
