<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Alerts extends Model implements Auditable
{
    use HasFactory, AuditableTrait;
    protected $table = 'alerts';
    protected $guarded = ['id'];

    protected $fillable = [
        'alert_ticket',
        'alert_msg',
        'alert_type',
        'alert_hide_customer',
        'alert_sent',
    ];
    public static function sendAlert($tkno,$amsg,$atype,$acus): bool
    {
        $alert = new Alerts();
        $alert->alert_ticket = $tkno;
        $alert->alert_msg = $amsg;
        $alert->alert_type = $atype;
        $alert->alert_hide_customer = $acus;
        return $alert->save();
    }
}
