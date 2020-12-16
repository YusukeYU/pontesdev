<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lead extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_lead';
    protected $fillable = [
        'name_lead',
        'email_lead',
        'phone_lead',
        'msg_lead',
    ];

    public static function stats()
    {
        try {
            /* ATRIBUINDO INFORMAÇÕES INICIAIS PARA TRABALHAR COM O TEMPO */
            $tst = new \Carbon\Carbon();
            $tst = \Carbon\Carbon::now();
            $tst->hour = '00';
            $tst->minute = '00';
            $tst->second = '00';
            /************************************************************* */

            $day = DB::table('leads')
                ->whereBetween('created_at', [$tst, (string) \Carbon\Carbon::now()])
                ->get();

            $tst->day = '01';

            $month = DB::table('leads')
                ->whereBetween('created_at', [$tst, (string) \Carbon\Carbon::now()])
                ->get();

            $tst->month = '01';

            $year = DB::table('leads')
                ->whereBetween('created_at', [$tst, (string) \Carbon\Carbon::now()])
                ->get();

            $leads = DB::table('leads')->get();

            $data = [
                'day' => (int) count($day),
                'month' => (int) count($month),
                'year' => (int) count($year),
                'all' => (int) count($leads),
            ];
            return $data;
        } 
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
