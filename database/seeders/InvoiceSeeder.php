<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (range(1 , 25 ) as $item){
            Invoice::create([
                'member_id' => rand(1,100),
                 'start_date' => date('Y-m-d'),
                  'end_date'  => date('Y-m-d'),
                   'amount' =>  rand(100,500),
                    'fee_type' =>  1,
                     'payment_type' => 1 ,
                      'created_by' => rand(1 , 25) ,
                    ]);
        }
    }
}
