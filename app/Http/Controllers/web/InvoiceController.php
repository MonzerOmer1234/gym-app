<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        //
        $invoices = Invoice::all();

        return view('staff.invoices.index' , ['invoices' => $invoices]);


    }

    /**
     * Show the form for creating a new resource.
     * @param string $id
     * @return view
     */
    public function createReceipt(string $id)
    {
        //
        $member = Member::find($id);
         return view('staff.invoices.create' , ['member' => $member]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //


        $data = $request->all();
       $validator = Validator::make($data , [
         'member_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required | date',
        'amount' => 'required',
        'fee_type' => 'required',
        'payment_type' => 'required',
        'created_by' => 'required',

       ]);

       Invoice::create([
        'member_id' => $request->member_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'amount' => $request->amount,
        'fee_type' => $request->fee_type,
        'payment_type' => $request->payment_type,
        'created_by' => auth()->user()->id,

       ]);

       return to_route('invoices-data');

    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return view
     */
    public function show(string $id)
    {

        $invoice = Invoice::find($id);
       return view('staff.invoices.show' , ['invoice' => $invoice]);

    }
    /**
     * Delete the specified resource.
     * @param string $id
     * @return view
     */
    public function destroy(string $id){


        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->route('invoices-data');
    }



}
