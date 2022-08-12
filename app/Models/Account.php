<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'opening_balance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function accountDeposits()
    {
        return $this->hasMany(Deposit::class, 'account_id', 'id');
    }

    public function accountExpenses()
    {
        return $this->hasMany(Expense::class, 'account_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
