<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SysLog extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];
    protected $table = 'sys_log'; 

    protected $fillable = [
        'log_time',
        'log_user',
        'log_title',
        'log_msg',
        'log_host'
    ];

    public $timestamps = true; 
    public static function insertLog($log_user_name,$logTitle,$logMsg,$client_ip): bool
    {
        $sys_log = new SysLog();
        $sys_log->log_user  = $log_user_name;
        $sys_log->log_title = $logTitle;
        $sys_log->log_msg   = $logMsg;
        $sys_log->log_host  = $client_ip;
        return $sys_log->save();
    }
}
