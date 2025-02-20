<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Branches extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];
    protected $table='branches';

    //Relationships

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class,'branch_id','id');
    }

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class,'service_branch','id');
    }

    //Functions

    /**
     * Get Branch status by given user_status id
     * @param int $status_id
     * @return string
     */
    public function get_status($status_id) : string
    {
        $statuses = config('constants.branch_statuses');

        foreach ($statuses as $key => $value) {
            if ($key == $status_id) {
                return $value;
            }
        }
    }
}
