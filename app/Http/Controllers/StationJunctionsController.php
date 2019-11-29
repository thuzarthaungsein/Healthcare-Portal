<?php

namespace App\Http\Controllers;
use App\StationJunctions;

use Illuminate\Http\Request;

class StationJunctionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function getStationbyCustomerId($customer_id) {

    }

    public function update(Request $request, $id)
    {
        $request = $request->all();

        $feature = StationJunctions::where('customer_id', $id)
                    ->delete();

        for($indx=0; $indx<count($request[0]['station_id']); $indx++) {
            $new_feature = new StationJunctions();
            $new_feature->customer_id = $id;
            $new_feature->station_id = $request[0]['station_id'][$indx];
            $new_feature->save();
        }

        return response()->json('Station has successfully updated');
    }
}
