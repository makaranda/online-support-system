<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

class TicketNumber extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table='ticket_numbers';

    protected $fillable = [
        'branch_id',
        'prefix',
        'last_number',
        'suffix',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
