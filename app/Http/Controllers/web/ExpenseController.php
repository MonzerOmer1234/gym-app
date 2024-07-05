<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        //
        $expenses = Expense::all();
        return view('staff.expenses.index' , ['expenses' => $expenses]);
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */

    public function create()
    {
        //
        return view('staff.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'amount' => 'required ',
            'date' => 'required',
            'type' => 'required',


        ]);


        Expense::create($request->post() + [ "created_by" => auth()->user()->id]);

        return to_route('expenses-data');
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {
        //
        $expense = Expense::find($id);
        return view('staff.expenses.show' , ['expense' => $expense] );
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return view
     */
    public function edit(string $id)
    {
        //
        $expense = Expense::find($id);
        Gate::authorize('update' , $expense);
        return view('staff.expenses.edit' , ['expense' => $expense]);
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
        $expense = Expense::find($id);
        Gate::authorize('update' , $expense);
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'type' => 'required',


        ]);
        $expense->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'date' => $request->date,
            'type' => $request->type,


        ]);


        return to_route('expenses-data');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return Response
     */
    public function destroy(string $id)
    {
        //
        $expense = Expense::find($id);
        Gate::authorize('delete' , $expense);
        $expense->delete();
        return to_route('expenses-data');
    }
}
