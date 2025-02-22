<?php

namespace App\Http\Controllers\Admin\Tickets;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TicketDataReource;

class TicketsController extends Controller
{
    public function get_ticket_data (Request $request): JsonResponse
    {
        if($request->has('ticket_id') && $request->get('ticket_id') !== null){

            $ticket_data = Tickets::where('id',$request->get('ticket_id'))
                ->with('serviceBranch','serviceType','createdBy','assignedBy','assignedTo','ticketResponses')
                ->first();

            return response()->json(new TicketDataReource($ticket_data),201);
        }else{
            return response()->json(['message'=>'error']);
        }

    }
}
