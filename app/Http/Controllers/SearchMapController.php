<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;
class SearchMapController extends Controller
{
    public function getMap(Request $request, $id){
      
      
        // return $id;
        $query = "SELECT n.id,n.latitude as lat ,n.longitude as lng , n.feature, n.business_entity
                  from customers As c  Join townships As t on t.id =  c.townships_id 
                  Join nursing_profiles As n on n.customer_id = c.id 
                  where t.city_id =".$id." order BY n.id ASC LIMIT 26";
        $nus_latlng = DB::select($query);

    
        $title = $request->title;
        $mapid = $request->id;

        $getCityId          = DB::table('cities')->where('id',$mapid)->select('id')->pluck('id');
        $getCity            = DB::table('cities')->where('id',$mapid)->get();
        $city               = DB::table('cities')->get();
        $getTownships       = DB::table('townships')->where('city_id',$getCityId)->get();
        $special_features   = DB::table('special_features')->get();
        $fac_types          = DB::table('fac_types')->get();
        $subjects           = DB::table('subjects')->get();
        $medical_acceptance = DB::table('medical_acceptance')->get();
        $occupations        = DB::table('occupation')->get();
        return response()->json(['getTownships'=>$getTownships,
                                 'getCity'=>$getCity,
                                 'city'=>$city,
                                 'special_features'=>$special_features,
                                 'fac_types'=>$fac_types,
                                 'medical_acceptance'=>$medical_acceptance,
                                 'subjects'=>$subjects,
                                 'nus_latlng' => $nus_latlng,
                                 'occupations'=>$occupations]);
    }

    public  function getMapTownship($id)
    {
      
      
            $query = "SELECT n.id,n.latitude as lat ,n.longitude as lng, n.feature, n.business_entity from customers As c  Join nursing_profiles As n on n.customer_id = c.id 
            where c.townships_id IN (" . $id . ")  order BY n.id ASC LIMIT 26";
           
            $nus_latlng = DB::select($query);
           
       
            return response()->json($nus_latlng);
      
       
    } 

 
    public function getJobSearch()
    {
        //for city
        $id = $_GET['id'];

        
        //to check if township is check or not 
        $townshipID = $_GET['townshipID'];    
        if($townshipID[0] == '0' && count($townshipID) == 1) //get param value of jobsearch.vue and if value is 0 and count =1 , this condition is "No Check"
        {
            $townshipID = '0';
        }else if($townshipID[0] == '0' && count($townshipID) > 1){ //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
            unset($townshipID[0]);
            $townshipID = implode(',',$townshipID);
        } else{
            $townshipID = implode(',',$townshipID); // this condition is when array[0] has no '0'
        }

    
        //to check if occupation is check or not
        $occupationID = $_GET['occupationID'];

        if($occupationID[0] == '0' && count($occupationID) == 1)
        {
             $occupationID = '0';
        }else if($occupationID[0] == '0' && count($occupationID) > 1){
             unset($occupationID[0]);
             $occupationID = implode(',',$occupationID);
        } else{
             $occupationID = implode(',',$occupationID);  
        }
       
     
    
        //to check if employment status is check or not
        $empstatus = $_GET['empstatus'];

        if($empstatus[0] === '0' && count($empstatus) === 1)
        {       
            $empstatus = '0';
        } else if($empstatus[0] === '0' && count($empstatus) > 1){
           
            unset($empstatus[0]);
            $empstatus = implode(',',$empstatus);   
        } else{ 
            $empstatus = implode(',',$empstatus);  
        }
      

        
        if($townshipID == '0' && $occupationID == '0' &&  $empstatus == '0')
        { 
            $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
            Join townships as t on t.id = c.townships_id 
            where t.city_id =".$id;

            $job_data = DB::select($query);
        }
        else if($townshipID != '0'  && $occupationID == '0' && $empstatus == '0'  )
        {  
            $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
            Join townships as t on t.id = c.townships_id  
            where t.city_id =" .$id. " and t.id in (".$townshipID.")";

            $job_data = DB::select($query);
        }
        else if($townshipID != '0' && $occupationID != '0' && $empstatus == '0')
        { 
            $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
            Join townships as t on t.id = c.townships_id 
            where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.")";

            $job_data = DB::select($query);
        }
        else if($townshipID != '0' && $occupationID == '0' && $empstatus != '0')
        {    
            $empstatus = explode(',',$empstatus); 
            
            if(count($empstatus) == 4)
            {
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3)
            {
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'" ;
            }
            else if(count($empstatus) == 2){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'" ;
            }
            else  {
 
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '".$empstatus[0] ."'";
            }
        
            $job_data = DB::select($query);
        }
        else if($townshipID == '0' && $occupationID != '0' && $empstatus != '0')
        {
            $empstatus = explode(',',$empstatus);

            if(count($empstatus) == 4){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."'";
            }
           

            $job_data = DB::select($query);
        }
        else if($townshipID == '0' && $occupationID == '0' && $empstatus != '0')
        {  
            $empstatus = explode(',',$empstatus);  

            if(count($empstatus) == 4){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."'";
            }
       
            $job_data = DB::select($query);
        }
        else if($townshipID == '0' && $occupationID != '0' && $empstatus == '0')
        {  
            $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
            Join townships as t on t.id = c.townships_id 
            where t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")";

            $job_data = DB::select($query);
        }
        else if($townshipID != '0' && $occupationID != '0' && $empstatus != '0')
        {
            $empstatus = explode(',',$empstatus);
            
            if(count($empstatus) == 4){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,(CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum from customers As c  Join nursing_profiles As n on n.customer_id = c.id Join hospital_profiles As h on h.customer_id = c.id Join jobs as j on j.customer_id = c.id 
                Join townships as t on t.id = c.townships_id 
                where t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."'";
            }

            $job_data = DB::select($query);
        }
       

        return response()->json($job_data);
      

    }
 

    
    public function getCity(Request $request)
    {
        $id = $request->id;
        $getTownships = DB::table('townships')->where('city_id',$id)->get();
        return response()->json($getTownships);
    }
}
