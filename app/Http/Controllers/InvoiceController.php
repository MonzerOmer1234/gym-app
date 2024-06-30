<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoices =  Invoice::with('user' , 'member')->paginate(10);
        $success = "the data is received successfully";
        $fail = "facing errors hile fetching data";
       return response([

           'status' => $invoices ? $success : $fail ,
           'invoices' => $invoices,

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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $invoice =  Invoice::with('user' , 'member')->find($id);
        if($invoice){
            return response([
                'message' => 'the invoice is fetched successfully',
                'invoice' => $invoice
            ]) ;
        } else{
            return response([
                'message' => "the invoice is not found",
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
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
