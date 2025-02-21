<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;

class TicketStatus extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];
    protected $table='ticket_statuses';

    /**
     * @return HasMany
     */
    public function ticketResponses(): HasMany
    {
        return $this->hasMany(TicketResponse::class,'ticket_status_id','id');
    }
}
