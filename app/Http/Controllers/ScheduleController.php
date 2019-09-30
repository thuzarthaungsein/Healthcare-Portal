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
            if($i == 0) { $part = 'am'; } else { $part = 'pm'; }
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

    public function getSchedulebyCustomerId($customer_id) {

        $schedule_am = Schedule::where('customer_id', $customer_id)
                            ->where('part', '=', 'am')
                            ->get()
                            ->toArray();
        
        if($schedule_am) {

            $tmp_arr = explode('-',$schedule_am[0]['mon']);
            $am['am_mon_from'] = $tmp_arr[0];
            $am['am_mon_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['tue']);
            $am['am_tue_from'] = $tmp_arr[0];
            $am['am_tue_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['wed']);
            $am['am_wed_from'] = $tmp_arr[0];
            $am['am_wed_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['thu']);
            $am['am_thu_from'] = $tmp_arr[0];
            $am['am_thu_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['fri']);
            $am['am_fri_from'] = $tmp_arr[0];
            $am['am_fri_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['sat']);
            $am['am_sat_from'] = $tmp_arr[0];
            $am['am_sat_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_am[0]['sun']);
            $am['am_sun_from'] = $tmp_arr[0];
            $am['am_sun_to'] = $tmp_arr[1];
        
        } else {
           
            $am['mon_from'] = '';
            $am['mon_to'] = '';

           
            $am['tue_from'] = '';
            $am['tue_to'] = '';

            
            $am['wed_from'] = '';
            $am['wed_to'] = '';

            
            $am['thu_from'] = '';
            $am['thu_to'] = '';

            
            $am['fri_from'] = '';
            $am['fri_to'] = '';

            
            $am['sat_from'] = '';
            $am['sat_to'] = '';

            
            $am['sun_from'] = '';
            $am['sun_to'] = '';
        }


        $schedule_pm = Schedule::where('customer_id', $customer_id)
                                ->where('part', '=', 'pm')
                                ->get()
                                ->toArray();
      
        if($schedule_pm) {
            $tmp_arr = explode('-',$schedule_pm[0]['mon']);
            $pm['pm_mon_from'] = $tmp_arr[0];
            $pm['pm_mon_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['mon']);
            $pm['pm_tue_from'] = $tmp_arr[0];
            $pm['pm_tue_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['wed']);
            $pm['pm_wed_from'] = $tmp_arr[0];
            $pm['pm_wed_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['thu']);
            $pm['pm_thu_from'] = $tmp_arr[0];
            $pm['pm_thu_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['fri']);
            $pm['pm_fri_from'] = $tmp_arr[0];
            $pm['pm_fri_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['sat']);
            $pm['pm_sat_from'] = $tmp_arr[0];
            $pm['pm_sat_to'] = $tmp_arr[1];

            $tmp_arr = explode('-',$schedule_pm[0]['sun']);
            $pm['pm_sun_from'] = $tmp_arr[0];
            $pm['pm_sun_to'] = $tmp_arr[1];

        } else {
           
            $pm['mon_from'] = '';
            $pm['mon_to'] = '';

            
            $pm['tue_from'] = '';
            $pm['tue_to'] = '';
            
            $pm['wed_from'] = '';
            $pm['wed_to'] = '';

            
            $pm['thu_from'] = '';
            $pm['thu_to'] = '';

            
            $pm['fri_from'] ='';
            $pm['fri_to'] = '';

           
            $pm['sat_from'] = '';
            $pm['sat_to'] = '';

            
            $pm['sun_from'] = '';
            $pm['sun_to'] = '';
        }

        $schedule = array_merge($am,$pm);

        return $schedule;

    }
}
