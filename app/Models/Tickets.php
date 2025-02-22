<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Tickets extends Model implements AuditableContract
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table = 'tickets';

    protected $fillable = [
        'no',
        'date',
        'customer_id',
        'customer',
        'customer_type',
        'wacc',
        'address',
        'email',
        'email_cc',
        'tel',
        'cell',
        'service_branch',
        'service_type',
        'subject',
        'priority',
        'source',
        'call',
        'inquiry_type',
        'call_type',
        'line',
        'duration',
        'call_time',
        'created_by',
        'assigned_by',
        'assigned_to',
        'host',
        'device',
        'is_closed',
    ];

    public function ticketResponses()
    {
        return $this->hasMany(TicketResponse::class, 'ticket_id', 'id');
    }
    // Relationships
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceBranch(): BelongsTo
    {
        return $this->belongsTo(Branches::class, 'service_branch');
    }

    public function serviceType(): BelongsTo
    {
        return $this->belongsTo(Departments::class, 'service_type');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    public static function getCurrentStatus(Tickets $ticket): TicketStatus
    {
        $latest_ticket_status = $ticket->ticketResponses()->orderByDesc('id');
    
        if($latest_ticket_status->count() > 0){
            return $latest_ticket_status->first()->ticketStatus;
        }
    
        return new TicketStatus();
    }
    public static function getDatesInDBFormat($date_range_string): array
    {
        $from_date = trim(explode('-',$date_range_string)[0]);
        $to_date = trim(explode('-',$date_range_string)[1]);

        $formatted_from_date = date('Y-m-d',strtotime($from_date));
        $formatted_to_date = date('Y-m-d',strtotime($to_date));

        return ['from'=>$formatted_from_date,'to'=>$formatted_to_date];
    }
    public static function GetAssignedTickets(): int
    {
        $auth_user = \Auth::user();
        $auth_user->usertype_id = 1;

        if($auth_user->usertype_id < 3){
           return self::whereIsClosed(0)->where('assigned_to','<>',0)->count();
        }

        if($auth_user->usertype_id == 3){
            return self::whereIsClosed(0)->where('service_branch','=',$auth_user->branch_id)->count();
        }

        if($auth_user->usertype_id > 3){
            return self::whereIsClosed(0)->where('assigned_to',$auth_user->id)->count();
        }

    }
    public static function GetOpenedTickets(): int
    {

        $auth_user = \Auth::user();
        $auth_user->usertype_id = 1;
        if($auth_user->usertype_id < 3){
            return self::whereIsClosed(0)->count();
        }

        if($auth_user->usertype_id == 3){
            return self::whereIsClosed(0)->where('service_branch','=',$auth_user->branch_id)->count();
        }

        if($auth_user->usertype_id > 3){
            return self::whereIsClosed(0)->where('created_by',$auth_user->id)->count();
        }

    }
    public static function getLastResponseByTicket(Tickets $ticket){
        $max_date_in_collection = $ticket->ticketResponses->max('date');
        return $ticket->ticketResponses->where('date',$max_date_in_collection)->first();
    }
    public static function getCustomerType($cus_type_id) : string
    {
        $cus_types = config('constants.customer_types');
        foreach ($cus_types as $key => $value) {
            if ($key == $cus_type_id) {
                return $value;
            }
        }
    }
    public static function boot()
    {
        parent::boot();

        // self::creating(function ($model) {
        //     TicketNumber::updateTicketNumbers($model->serviceBranch,1);
        //     $model->no = TicketNumber::getNextTicketNumber($model->serviceBranch,1);
        // });
    }
}
