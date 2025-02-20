<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Customers extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table='customers';
    protected $guarded = ['id'];

    protected $fillable = ['title',
                    'first_name',
                    'last_name',
                    'company_name',
                    'cus_type',
                    'busi_type',
                    'phy_add_1',
                    'phy_add_2',
                    'phy_add_3',
                    'post_add_1',
                    'post_add_2',
                    'post_add_3',
                    'area',
                    'city',
                    'site_details',
                    'tp1',
                    'tp2',
                    'fax1',
                    'fax2',
                    'email',
                    'btsName',
                    'kbilling_no',
                    'con_type_id',
                    'con_name',
                    'productName',
                    'branch_ID',
                    'status',
                    'email_status',
                    'bulk_status',
                    'last_email_sent_on',
                    'addedDate'];

    //Relationships

    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class,'customer_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function emailLogs(): BelongsToMany
    {
        return $this->belongsToMany(EmailLog::class,'email_customer')
            ->withPivot('status', 'created_at','updated_at');
    }
}
