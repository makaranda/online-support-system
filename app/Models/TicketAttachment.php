<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;

class TicketAttachment extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];
    protected $table='ticket_attachments';

    protected $fillable = [
        'ticket_response_id',
        'file_name',
        'date',
        'added_user',
    ];

    public function ticketResponse(): BelongsTo
    {
        return $this->belongsTo(TicketResponse::class,'ticket_response_id','id');
    }

    public function addedUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'added_user','id');
    }
}
