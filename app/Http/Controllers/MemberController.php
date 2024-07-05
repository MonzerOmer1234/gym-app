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
        $members =  Member::all();
         $success = "the data is received successfully";
         $fail = "facing errors while fetching data";
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
            'name' => 'required',
            'gender' => 'required',
            'mobile' => 'required | max:11',
            'blood_group' => 'required',
            'address' => 'required',
            'photo' => 'required',
            'available_exercises' => "required",
            'status' => 'required',
            'created_by'=> 'required',


        ]);


        $member = Member::create([

            'name' => $request->name,
            'gender'=> $request->gender,
            'mobile' =>  $request->mobile,
            'address' =>  $request->address,
            'blood_group' => $request->blood_group,
            'photo' =>  $request->photo,
            'created_by' => $request->created_by,
            'available_exercises' => $request->available_exercises,
            "status" => $request->status,



        ]);



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
                'member' => $member,
            ]) ;
        } else{
            return response([
                'message' => "the member is not found",
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $member = Member::find($id);
        if($member){
            $request->validate([
                'name' => 'required',
                'gender' => 'required',
                'mobile' => 'required | max:11',
                'blood_group' => 'required',
                'address' => 'required',
                'available_exercises' => 'required',
                'photo' => 'nullable',
            ]);
            $member->fill($request->post())->update();




        }
        return response([
            'success' => true,
            'message' => 'The member is updated successfully',
            'member' => $member,
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

        $member->delete();
        return response([
            'message' => 'the member is deleted successfully',
            ]);

            }
         else{
            return response([
                'message' => 'The member is not found'
            ] , 404);
        }

    }
}
