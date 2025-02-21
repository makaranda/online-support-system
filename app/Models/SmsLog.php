<?php

namespace App\Models;

use App\Support\HttpCurl;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SmsLog extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'sms_logs';
    protected $fillable = [
        'sms_id',
        'number',
        'msg',
        'time',
        'response',
    ];
    public function smsMsg(): BelongsTo
    {
        return $this->belongsTo(SmsMsg::class,'sms_id','id','sms_numbers');
    } 
    public static function insertLogRecord($cell_number,$message){

    }
}
