<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable =['member_id' , 'start_date' , 'end_date' , 'amount' , 'fee_type' , 'payment_type' , 'created_by'];
    public function user(){
        return $this->belongsTo(User::class , 'created_by')->select('id' , 'name');
    }
    public function member(){
        return $this->belongsTo(Member::class , 'member_id');
    }
}
