<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'table_transaction';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $with = ['transactionDetail'];

    public function transactionDetail(){
        return $this->hasMany(transactionDetails::class, 'transaction_uid', 'uid');
    }
}
