<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CrmCdr extends Model
{
    use HasFactory;
    protected $table = 'crm_cdr';
    protected $guarded = ['id'];

    public static function callForTicketsCount()
    {
        $crm_cdr = self::getModel()->getTable();
        $ticket_responses = TicketResponse::getModel()->getTable();
        return DB::table($crm_cdr)
            ->select('id', 'uniqueid', 'status', 'disposition')
            ->rightJoin($ticket_responses, "$ticket_responses.asteriskid", '=', "$crm_cdr.uniqueid")
            ->where(["$crm_cdr.status" => 1, "$crm_cdr.disposition" => 'ANSWERED'])
            ->count('uniqueid');
    }

    public static function callForTickets(Request $request)
    {
        $crm_cdr = self::getModel()->getTable();
        $ticket_responses = TicketResponse::getModel()->getTable();

        $data = DB::table($crm_cdr)
            ->select('*')
            ->join($ticket_responses, "$ticket_responses.asteriskid", '=', "$crm_cdr.uniqueid")
            ->where(["$crm_cdr.status" => 1, "$crm_cdr.disposition" => 'ANSWERED']);

        if ($request->has('date_range') && $request->get('date_range') !== null) {
            $formatted_dates = Ticket::getDatesInDBFormat($request->get('date_range'));
            $data->whereBetween("$crm_cdr.calldate", [$formatted_dates['from'], $formatted_dates['to']]);
        }

        if ($request->has('source') && $request->get('source') !== null) {
            $data->where("$crm_cdr.src", $request->get('source'));
        }

        if ($request->has('destination') && $request->get('destination') !== null) {
            $data->where("$crm_cdr.dst", $request->get('destination'));
        }

        return $data->orderBy("$ticket_responses.date", 'desc')->paginate(25);
    }

    public static function getTicketDataByUniqueId($unique_id): array
    {
        $data = TicketResponse::whereAsteriskid($unique_id)->get();
        return [
            'count' => $data->isNotEmpty() ? $data->count() : 0,
            'ticket_no' => $data->isNotEmpty() && $data->first()->ticket !== null ? $data->first()->ticket->no : '',
            'ticket_id' => $data->isNotEmpty() && $data->first()->ticket !== null ? $data->first()->ticket_id : null
        ];
    }

    public static function getCallRecord($unique_id): array
    {
        if (!isset($unique_id)) {
            return [];
        }

        $result = CrmCdr::whereUniqueid($unique_id)->first();
        if (!$result) {
            return [];
        }

        $arr = [
            'asteriskid' => $unique_id,
            'call' => "$result->org -> $result->dst",
            'line' => $result->org,
            'duration' => $result->duration,
            'calldate' => $result->calldate,
            'call_direction' => ''
        ];

        $recording_file = $result->recordingfile;
        $arr_file = explode('-', $recording_file);

        if ($arr_file && count($arr_file) > 0) {
            $call_direction = $arr_file[0];
            if ($call_direction == 'in' || $call_direction == 'internal') {
                $arr['call_direction'] = 'in';
                $tel = preg_replace('/^(\+265|265|00265)/', '0', $result->cnum);
                $arr['tel'] = is_numeric($tel) ? $tel : '';
                $cname = $result->cnam;

                if (!is_numeric($cname) && $cname != "unknown") {
                    $arr_cname = explode('-', $cname);
                    if (count($arr_cname) > 1) {
                        $arr['wacc'] = $arr_cname[0];
                        $arr['name'] = $arr_cname[1];
                    } else {
                        $arr['name'] = $cname;
                    }
                }
            } elseif ($call_direction == 'out') {
                $arr['call_direction'] = 'out';
                $tel = preg_replace('/^211/', '', $result->dst);
                $arr['tel'] = is_numeric($tel) ? $tel : '';
            }
        }

        return $arr;
    }
}
