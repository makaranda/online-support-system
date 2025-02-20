<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Notice extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];
    protected $table='notices';

    //Relationships

    /**
     * @return BelongsTo
     */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'added_by','id');
    }

    //Functions

    public function get_status($ststus_id){
        $statuses = [0 =>'Disabled',1=>'Enabled'];

        foreach($statuses as $key => $status){
            if($ststus_id == $key){
                return $status;
            }
        }
    }
}
