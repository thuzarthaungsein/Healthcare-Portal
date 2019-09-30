<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::all()->toArray();
        return array_reverse($schedule);
     
    }

    public function update($customer_id,Request $request) {
        $request = $request->all();

        $schedule = Schedule::where('customer_id', $customer_id)
                    ->delete();

        for($i=0; $i<2; $i++) {
                if($i == 0) {
                    $part = 'am';
                } else {
                    $part = 'pm';
                }

                $data = array(
                'customer_id' => $customer_id,
                'mon' => $request[$i][0],
                'tue' => $request[$i][1],
                'wed' => $request[$i][2],
                'thu' => $request[$i][3],
                'fri' => $request[$i][4],
                'sat' => $request[$i][5],
                'sun' => $request[$i][6],
                'part' => $part,
                'created_at' => date('Y/m/d H:i:s'),
                'updated_at' => date('Y/m/d H:i:s') 
                );
            DB::table('schedule')->insert($data);
        }
    }
}
