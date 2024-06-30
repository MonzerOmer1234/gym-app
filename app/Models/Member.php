<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{



    use HasFactory;
    protected $fillable = [

        'name',
        'mobile',
        'gender',
        'blood_group',
        'address',
        'photo',
        'lock',
        'start_date',
        'end_date',
        'card_no',
        'created_by',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class , 'created_by')->select('id' , 'name');
    }
    public function invoices(){
        return $this->hasMany(Invoice::class , 'member_id');
    }
}
