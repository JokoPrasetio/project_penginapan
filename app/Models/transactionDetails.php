<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionDetails extends Model
{
    use HasFactory;

    protected $table = 'table_transaction_details';
    protected $guarded = ['id'];
    public $timestamps = true;
}
