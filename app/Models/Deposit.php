<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'deposits';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'depositor_id',
        'amount',
        'account_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function depositor()
    {
        return $this->belongsTo(Depositor::class, 'depositor_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
