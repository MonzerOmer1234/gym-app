<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $expenses =  Expense::select(['name', 'amount', 'date', 'type', 'created_by'])
            ->paginate(10);
        $success = "the data is received successfully";
        $fail = "facing errors hile fetching data";
        return response([

            'status' => $expenses ? $success : $fail,
            'expenses' => $expenses,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'name' => 'required ',
            'amount' => 'required',
            'date' => 'required',
            'type' => 'required',
            'created_by' => 'required',

        ]);


        $expenses = Expense::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'date' => $request->date,
            'type' =>  $request->type,
            'created_by'=>$request->created_by,

        ]);



        return response([
            'message' => 'the expense is created successfully',
            'expenses' => $expenses,
        ]);
    }


    /**
     * Display the specified resource.
     * @param string $id
     * @return Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        //
        $expense =  Expense::find($id);
        if ($expense) {
            return response([
                'message' => 'the expense is fetched successfully',
                'expense' => $expense
            ]);
        } else {
            return response([
                'expense' => "the expense is not found",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $expense = Expense::find($id);
        if($expense){
            $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'date' => 'required',
                'type' => 'required',
                'created_by' => 'required',
            ]);
              $expense->fill($request->post())->update();

            };

        return response([
            'message' => 'The expense is updated successfully',
            'expense' => $expense,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        //
        $expense = Expense::find($id);

        if ($expense) {
            $expense->delete();
            return response([
                'message' => 'the expense is deleted successfully',
            ]);
        } else {
            return response([
                'message' => 'The expense is not found'
            ]);
        }
    }
}
