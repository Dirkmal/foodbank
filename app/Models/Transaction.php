<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'transaction_type',
        'transaction_id',
        'transaction_ref',
        'amount'
    ];
}
