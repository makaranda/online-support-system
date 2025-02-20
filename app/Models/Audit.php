<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class Audit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table='audits';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function get_today_latest_five(){
        return $audits = self::where('user_id', Auth::user()->id)->orderBy('id','desc')->get()->take(5);
    }

    public static function get_today_activities_count(){
        $audits = $layout_today_activities = self::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->get();
        $count=0;
        foreach($audits as $audit){
            if($audit->user_id == Auth::user()->id){
                $count++;
            }
        }
        return $count;
    }

    public static function getLastMonthLogsByGivenUser(User $user,$paginate_count){
        $from = Carbon::now()->subDays(30)->toDateString();
        $to = Carbon::now()->toDateString();
        $latest_audits = self::where('user_id',$user->id)
            ->whereBetween('created_at',[$from,$to])
            ->orderBy('created_at','desc')
            ->paginate($paginate_count);


        return $latest_audits;
    }

    public static function getLatestTenByGivenUser(User $user){

        $latest_audits = self::where('user_id',$user->id)
            ->orderBy('created_at','desc')
            ->get()
            ->take(10);
        return $latest_audits;
    }
}
