<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'member_id' => 'required',
            'start_date' => 'required ',
            'end_date' => 'required',
            'amount' => 'required',
            'fee_type' => 'required',
            "payment_type" => "required",
            "created_by" => "required",


        ]);


        $invoices = Invoice::create([
            'member_id' => $request->member_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'amount' => $request->amount,
            'fee_type' => $request->fee_type,
            "payment_type" => $request->payment_type,
            'created_by' => $request->created_by,


        ]);



        return response([
            'message' => 'the expense is created successfully',
            'invoices' => $invoices,
        ]);
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return JsonResponse
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
     * @param string $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::find($id);
        if($invoice){
            $request->validate([

                'start_date' => 'required',
                'end_date' => 'required',
                'amount' => 'required',
                'fee_type' => 'required',
                "payment_type" => "required",


            ]);
              $invoice->fill($request->post())->update();

            };

        return response([
            'message' => 'The invoice is updated successfully',
            'invoice' => $invoice,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            $invoice->delete();
            return response([
                'message' => 'the invoice is deleted successfully',
            ]);
        } else {
            return response([
                'message' =>  'the invoice is not found',
            ] , 404);
        }
    }
}
