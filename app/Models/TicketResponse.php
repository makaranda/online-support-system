<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TicketResponse extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];
    protected $table = 'ticket_responses'; // Ensure this matches your migration

    public static function getLastResponseByTicket(Tickets $ticket)
    {
        // Eager-load ticketResponses, then find the max date
        $ticket->load('ticketResponses');
        $max_date_in_collection = $ticket->ticketResponses->max('date');

        return $ticket->ticketResponses->where('date', $max_date_in_collection)->first();
    }

    public function crmcdr(): HasOne
    {
        return $this->hasOne(CrmCdr::class, 'uniqueid', 'asteriskid');
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Tickets::class);
    }

    public function addedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_user', 'id');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function ticketStatus(): BelongsTo
    {
        return $this->belongsTo(TicketStatus::class, 'ticket_status_id', 'id');
    }

    public function ticketAttachments(): HasMany
    {
        return $this->hasMany(TicketAttachment::class, 'ticket_response_id', 'id');
    }
}
