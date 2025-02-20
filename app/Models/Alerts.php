<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerts extends Model
{
    use HasFactory;
    protected $table = 'alerts';

    protected $fillable = [
        'alert_ticket',
        'alert_msg',
        'alert_type',
        'alert_hide_customer',
        'alert_sent',
    ];
}
