<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class TicketDataReource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => 'success',
            'id' => $this->id,
            'no' => $this->no,
            'date' => $this->date,
            'customer_name' => $this->customer,
            'customer_type' => $this->customer_type,
            'w_account_no' => $this->wacc,
            'address' => $this->address,
            'email' => $this->email,
            'tel' => $this->tel,
            'cell' => $this->cell,
            'service_branch' => $this->serviceBranch->name,
            'service_type' => ($this->serviceType)?$this->serviceType->name:'',
            'subject' => $this->subject,
            'priority' => $this->priority,
            'is_closed' => $this->is_closed,
            'created_by' => $this->createdBy,
            'assigned_to' => $this->assignedTo,
            'assigned_by' => $this->assignedBy,
            'ticket_responses' => $this->getResponses($this->ticketResponses),
            'last_ticket_response' => $this->ticketResponses()->orderBy('id','DESC')->first(),
        ];
    }

    /**
     * Get Ticket Response Data in formatted way
     * @param $responses
     * @return array
     */
    public function getResponses($responses): array
    {
        $responses_array = [];

        foreach($responses as $response){
            $responses_array[] = [
                'id'=> $response->id,
                'ticket_id'=> $response->ticket_id,
                'ticket_no'=> $response->ticket_no,
                'date'=> $response->date,
                'status'=> $response->ticketStatus->name,
                'response'=> $response->response,
                'added_user'=> ($response->addedUser)?$response->addedUser->username:'Public User',
                'assigned_to'=> $response->assignedTo,
                'ticket_status'=>$response->ticketStatus->name,
                'attachments'=>$this->getExistAttachments($response->ticketAttachments),
                'is_first'=> $response->is_first,
                'asteriskid' => $response->asteriskid,
            ];
        }

        return $responses_array;
    }

    /**
     * Get Available FIle Attachments
     * @param $ticketAttachments
     * @return Collection $collection
     */
    private function getExistAttachments($ticketAttachments) : Collection
    {
        $attachments = new Collection();
        foreach ($ticketAttachments as $key => $attachment){
            if(file_exists(public_path().$attachment->file_name)){
                $attachments->add($attachment);
            }
        }
        return $attachments;
    }
}
