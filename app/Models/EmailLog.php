<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Support\Collection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EmailLog extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    
    protected $guarded = ['id'];
    protected $table='email_logs';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id','email_logs');
    }

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class,'email_customer')
            ->withPivot('status', 'created_at','updated_at');
    }

    public function get_sent_status($sent_status_id)
    {
        $statuses = [0 =>'Not-Sent',1=>'Sent'];

        foreach($statuses as $key => $status){
            if($sent_status_id == $key){
                return $status;
            }
        }
    }
    public function get_count(): int
    {
        return self::where('address',$this->address)->get()->count();
    }
    public static function getCount($user_id) : int
    {
        return self::where('user_id',$user_id)->get()->count();
    }
    public static function insertLogRecord($address,$email_cc=null,$subject,$msg,$type,$user_id) : void
    {
            self::create(
                [
                    'address'       =>  $address,
                    'email_cc'      =>  $email_cc ?? '',
                    'subject'       =>  $subject,
                    'msg'           =>  $msg,
                    'time'          =>  Carbon::now()->toDateTimeString(),
                    'type'          =>  $type,
                    'user_id'       =>  $user_id,
                    'sent_status'   =>  0
                ]
            );

    }
}
