<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use App\Models\Ticket;



class Departments extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];
    protected $table='departments';
    protected $fillable = [
        'name',
        'code',
        'status',
    ];

    //Relationships

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'department_user','department_id','user_id');
    }

    /**
     * @return HasMany
     */
    public function serviceType(): HasMany
    {
        return $this->hasMany(Ticket::class,'service_type','id');
    }


    /**
     * Get Department status by given user_status id
     * @param int $status_id
     * @return string
     */
    public function get_status($status_id) : string
    {
        // $statuses = config('constants.department_statuses');

        // foreach ($statuses as $key => $value) {
        //     if ($key == $status_id) {
        //         return $value;
        //     }
        // }
    }
}
