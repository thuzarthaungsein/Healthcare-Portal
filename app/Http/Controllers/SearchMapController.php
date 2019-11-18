<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class SearchMapController extends Controller
{
    public function getMap()
    {

        $id = $_GET['id'];

        $township_id = $_GET['township_id'];
        $moving_in = $_GET['moving_in'];
        $per_month = $_GET['per_month'];
        $query = "SELECT '' as alphabet,n.id as nursing_id,n.id,n.latitude as lat ,n.longitude as lng, n.*,c.*,ci.city_name,t.township_name,ty.name AS type_name
                    FROM customers AS c 
                    LEFT JOIN townships AS t 
                    ON t.id = c.townships_id 
                    JOIN nursing_profiles AS n 
                    ON n.customer_id = c.id
                    LEFT JOIN cities AS ci
                    ON t.city_id = ci.id
                    JOIN types AS ty
                    ON c.type_id = ty.id
                    WHERE";

        if($id != null && $township_id == -1 && $moving_in == -1 && $per_month == -1 ){
            $query .= " t.city_id=" . $id . " group by c.id order BY n.id ASC LIMIT 26";    
        }
        else if($id != null && $township_id != -1 && $moving_in == -1 && $per_month == -1){
            $query .= " t.city_id=" . $id . " and t.id =".$township_id." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if($id != null && $township_id == -1 && $moving_in != -1 && $per_month == -1){
            $query .= " t.city_id=" . $id . " and n.moving_in_to <= ".$moving_in." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if ($id != null && $township_id == -1 && $moving_in == -1 && $per_month != -1){
            $query .= " t.city_id=" . $id . " and n.per_month_to <= ".$per_month." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if ($id != null && $township_id == -1 && $moving_in != -1 && $per_month != -1){
            $query .= " t.city_id=" . $id . " and n.per_month_to <= ".$per_month." and n.moving_in_to <= ".$moving_in." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if ($id != null && $township_id != -1 && $moving_in != -1 && $per_month != -1){
            $query .= " t.city_id=" . $id . " and n.moving_in_to <= ".$moving_in." and n.per_month_to <= ".$per_month." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if($id != null && $township_id != -1 && $moving_in != -1 && $per_month == -1){
            $query .= " t.city_id=" . $id . " and t.id =".$township_id." and n.per_month_to <= ".$moving_in." group by c.id order BY n.id ASC LIMIT 26";
        }
        else if($id != null && $township_id != -1 && $moving_in == -1 && $per_month != -1){
            $query .= " t.city_id=" . $id . " and t.id =".$township_id." and n.per_month_to <= ".$per_month." group by c.id order BY n.id ASC LIMIT 26";
        }
        
       
        $nursing_profile = DB::select($query);
    
        $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

        for($i = 0;$i<count($nursing_profile);$i++)
        {
            for($j=0;$j<count($alphabet);$j++)
            {
                if($i == $j)
                {
                    $nursing_profile[$i] =  (array)($nursing_profile[$i]) ;
                    $nursing_profile[$i]['alphabet']  = $alphabet[$j];
                   
                }
            }
        }

     

        $getCity            = DB::table('cities')->where('id', $id)->get();
        $city               = DB::table('cities')->get();
        $getTownships       = DB::table('townships')->where('city_id', $id)->get();
        $special_features   = DB::table('special_features')->get();
        $fac_types          = DB::table('fac_types')->get();
        $subjects           = DB::table('subjects')->get();
        $medical_acceptance = DB::table('medical_acceptance')->get();
        $occupations        = DB::table('occupation')->get();
        return response()->json([
            'getTownships' => $getTownships,
            'getCity' => $getCity,
            'city' => $city,
            'special_features' => $special_features,
            'fac_types' => $fac_types,
            'medical_acceptance' => $medical_acceptance,
            'subjects' => $subjects,
            'occupations' => $occupations,
            'nursing_profile' => $nursing_profile,
            'alphabet' => $alphabet
        ]);
    }

    public  function getMapTownship($id)
    {
        $query = "SELECT n.id,n.latitude as lat ,n.longitude as lng, n.feature, n.business_entity from customers As c  Join nursing_profiles As n on n.customer_id = c.id 
                  where c.townships_id IN (" . $id . ")  order BY n.id ASC LIMIT 26";

        $nus_latlng = DB::select($query);

        return response()->json($nus_latlng);
    }

    public function getNursingSearch()
    {
          //for city
          $id = $_GET['id'];

          //to check if township is check or not 
          $townshipID = $_GET['townshipID'];
          if ($townshipID[0] == '0' && count($townshipID) == 1) //get param value of hospitalsearch.vue and if value is 0 and count =1 , this condition is "No Check"
          {
              $townshipID = '0';
          } else if ($townshipID[0] == '0' && count($townshipID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
              unset($townshipID[0]);
              $townshipID = implode(',', $townshipID);
          } else {
              $townshipID = implode(',', $townshipID); // this condition is when array[0] has no '0'
          }
  
          //to check if specialfeature is check or not 
          $SpecialFeatureID = $_GET['SpecialFeatureID'];
          if ($SpecialFeatureID[0] == '0' && count($SpecialFeatureID) == 1) //get param value of nursingsearch.vue and if value is 0 and count =1 , this condition is "No Check"
          {
              $SpecialFeatureID = '0';
          } else if ($SpecialFeatureID[0] == '0' && count($SpecialFeatureID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
              unset($SpecialFeatureID[0]);
              $SpecialFeatureID = implode(',', $SpecialFeatureID);
          } else {
              $SpecialFeatureID = implode(',', $SpecialFeatureID); // this condition is when array[0] has no '0'
          }
  
          //to check if medicalacceptance is check or not 
          $MedicalAcceptanceID = $_GET['MedicalAcceptanceID'];
          if ($MedicalAcceptanceID[0] == '0' && count($MedicalAcceptanceID) == 1) //get param value of nursingsearch.vue and if value is 0 and count =1 , this condition is "No Check"
          {
              $MedicalAcceptanceID = '0';
          } else if ($MedicalAcceptanceID[0] == '0' && count($MedicalAcceptanceID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
              unset($MedicalAcceptanceID[0]);
              $MedicalAcceptanceID = implode(',', $MedicalAcceptanceID);
          } else 
          {
              $MedicalAcceptanceID = implode(',', $MedicalAcceptanceID); // this condition is when array[0] has no '0'
          }

          //to check if factype is check or not 
          $FacTypeID = $_GET['FacTypeID'];
          if ($FacTypeID[0] == '0' && count($FacTypeID) == 1) //get param value of nursingsearch.vue and if value is 0 and count =1 , this condition is "No Check"
          {
              $FacTypeID = '0';
          } else if ($FacTypeID[0] == '0' && count($FacTypeID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
              unset($FacTypeID[0]);
              $FacTypeID = implode(',', $FacTypeID);
          } else {
              $FacTypeID = implode(',', $FacTypeID); // this condition is when array[0] has no '0'
          }

           //to check if movingin is check or not 
           $MoveID = $_GET['MoveID'];
           if ($MoveID[0] == '0' && count($MoveID) == 1) //get param value of nursingsearch.vue and if value is 0 and count =1 , this condition is "No Check"
           {
               $MoveID = '0';
           } else if ($MoveID[0] == '0' && count($MoveID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
               unset($MoveID[0]);
               $MoveID = implode(',', $MoveID);
           } else {
               $MoveID = implode(',', $MoveID); // this condition is when array[0] has no '0'
           }
     

           $query = "SELECT '' as alphabet, n.id as nursing_id,n.latitude as lat ,n.longitude as lng,c.id as cus_id,c.*,n.*, ci.id as city_id, ci.city_eng,ci.city_name,t.township_name,ty.name AS type_name 
                     from nursing_profiles as n  
                     left join customers as c on c.id = n.customer_id 
                     left join types AS ty ON c.type_id = ty.id
                     left join townships as t on t.id = c.townships_id
                     left join cities as ci on ci.id = t.city_id
                     left join fac_types as f on f.id = n.fac_type 
                     left join special_features_junctions as spej on spej.customer_id = n.customer_id  
                     left join special_features as spe on spe.id = spej.special_feature_id
                     left join acceptance_transactions as acct on acct.customer_id = n.customer_id
                     left join medical_acceptance as med on med.id = acct.medical_acceptance_id where ";
        
           if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID === '0' )
           {
                $query .= " ci.id = ".$id." group by c.id";    
           }
           if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID === '0' )
           {
                $query .=   " ci.id =".$id." and t.id in (".$townshipID.") group by c.id";
           } 
           if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID === '0')
           {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") group by c.id";
           }
           if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID === '0')
           {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and med.id in (".$MedicalAcceptanceID.") group by c.id";
           }
           if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID === '0')
           {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") group by c.id";
           }

           if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID !== '0')
           {
                $MoveID = explode(',', $MoveID);
                if(count($MoveID) == 3) 
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                
                }
                else  if(count($MoveID) == 2)
                {
                  
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                   
                }
                else if(count($MoveID) ==1 )
                {
                 
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                           
                }
              
           }
     
           if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID === '0')
           {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") group by c.id";
           }

           if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID === '0')
           {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and f.id in (".$FacTypeID.") group by c.id";
           }

            if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID !== '0')
            {    
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";       
                }
                else if(count($MoveID) ==2)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                
            }

            if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID === '0')
            {    
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID !== '0')
            {    
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) ==3 )
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                   
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
               
            }

            if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID !== '0')
            {    
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3 )
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
     
            }
            
            if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                       
            }

            if($townshipID != 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                 $MoveID = explode(',',$MoveID);
                 if(count($MoveID) == 3)
                 {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                 }
                 else if(count($MoveID) == 2)
                 {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                 }
                 else if(count($MoveID) == 1)
                 {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                 }
                
            }

            if($townshipID != 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and t.id in (".$townshipID.") and spe.id in (".$SpecialFeatureID.") and f.id in (".$FacTypeID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") group by c.id";
            }
            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID !== '0')
            {     
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                      
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }  
               
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and  f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and  f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and  f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }  
                        
            }

            if($townshipID == 0 && $SpecialFeatureID != 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and spe.id in (".$SpecialFeatureID.") and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }  
                
            }
 
            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";       
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }  
                
            }

            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID != 0 && $FacTypeID == 0 && $MoveID !== '0')
                {
                    $MoveID = explode(',',$MoveID);
                    if(count($MoveID) == 3)
                    {
                        $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID." and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";
                         
                    }
                    else if(count($MoveID) == 2)
                    {
                        $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID." and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                    }
                    else if(count($MoveID) == 1)
                    {
                        $query .= " ci.id =".$id." and med.id in (".$MedicalAcceptanceID.") and f.id in (".$FacTypeID." and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                    }  
                    
                }
                
            }

            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID === '0')
            {
                $query .= " ci.id =".$id." and f.id in (".$FacTypeID.") group by c.id";
            }

            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID != 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";        
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and f.id in (".$FacTypeID.") and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                
            }
              
            if($townshipID == 0 && $SpecialFeatureID == 0 && $MedicalAcceptanceID == 0 && $FacTypeID == 0 && $MoveID !== '0')
            {
                $MoveID = explode(',',$MoveID);
                if(count($MoveID) == 3)
                {
                    $query .= " ci.id =".$id." and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' or n.moving_in like '%".$MoveID[2]."%' group by c.id";              
                }
                else if(count($MoveID) == 2)
                {
                    $query .= " ci.id =".$id." and n.moving_in like '%".$MoveID[0]."%' or n.moving_in like '%".$MoveID[1]."%' group by c.id";
                }
                else if(count($MoveID) == 1)
                {
                    $query .= " ci.id =".$id." and n.moving_in like '%".$MoveID[0]."%' group by c.id";
                }
                
            }

            $nus_data = DB::select($query);

            $spe_query = "SELECT spe.*,spej.customer_id from  special_features as spe join special_features_junctions as spej on spe.id = spej.special_feature_id";
            $specialfeature = DB::select($spe_query);

            $med_query = "SELECT med.*,acc.customer_id from acceptance_transactions as acc join medical_acceptance as med on acc.medical_acceptance_id = med.id";
            $medicalacceptance = DB::select($med_query);
            
            $fac_query = "SELECT fac.* from nursing_profiles as n  right join fac_types  as fac on fac.id = n.fac_type";
            $factype = DB::select($fac_query);
            
            $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

            for($i = 0;$i<count($nus_data);$i++)
            {
                for($j=0;$j<count($alphabet);$j++)
                {
                    if($i == $j)
                    {
                        $nus_data[$i] =  (array)($nus_data[$i]) ;
                        $nus_data[$i]['alphabet']  = $alphabet[$j];
                    
                    }
                }
            }
            $city = DB::table('cities')->where('id',$id)->get();
            return response()->json(array("nursing"=>$nus_data,
                                          "specialfeature"=>$specialfeature,
                                          "medicalacceptance"=>$medicalacceptance,
                                          "factype"=>$factype,
                                          "city"=>$city
                                        ));

         

        
    }



    public function getHospitalSearch()
    {

        //for city
        $id = $_GET['id'];


        //to check if township is check or not 
        $townshipID = $_GET['townshipID'];
        if ($townshipID[0] == '0' && count($townshipID) == 1) //get param value of hospitalsearch.vue and if value is 0 and count =1 , this condition is "No Check"
        {
            $townshipID = '0';
        } else if ($townshipID[0] == '0' && count($townshipID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
            unset($townshipID[0]);
            $townshipID = implode(',', $townshipID);
        } else {
            $townshipID = implode(',', $townshipID); // this condition is when array[0] has no '0'
        }

        //to check if specialfeature is check or not 
        $specialfeatureID = $_GET['specialfeatureID'];
        if ($specialfeatureID[0] == '0' && count($specialfeatureID) == 1) //get param value of hospitalsearch.vue and if value is 0 and count =1 , this condition is "No Check"
        {
            $specialfeatureID = '0';
        } else if ($specialfeatureID[0] == '0' && count($specialfeatureID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
            unset($specialfeatureID[0]);
            $specialfeatureID = implode(',', $specialfeatureID);
        } else {
            $specialfeatureID = implode(',', $specialfeatureID); // this condition is when array[0] has no '0'
        }

        //to check if subject is check or not 
        $subjectID = $_GET['subjectID'];
        if ($subjectID[0] == '0' && count($subjectID) == 1) //get param value of hospitalsearch.vue and if value is 0 and count =1 , this condition is "No Check"
        {
            $subjectID = '0';
        } else if ($subjectID[0] == '0' && count($subjectID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
            unset($subjectID[0]);
            $subjectID = implode(',', $subjectID);
        } else {
            $subjectID = implode(',', $subjectID); // this condition is when array[0] has no '0'
        }
         
        $query ="SELECT h.id as hos_id, c.id as cus_id, h.*,c.*
                from  hospital_profiles as h 
                join customers as c on h.customer_id = c.id 
                left join townships as t on t.id = c.townships_id  
                left join cities as ci on ci.id = t.city_id
                left join special_features_junctions as spej on spej.customer_id = c.id 
                left join special_features as spe on spe.id = spej.special_feature_id
                left join subject_junctions as subj on subj.customer_id = c.id
                left join subjects as sub on sub.id = subj.subject_id
                where ";

        if ($townshipID == '0' && $specialfeatureID == '0' &&  $subjectID == '0') {
            $query .= " ci.id = " . $id . " group by c.id";

        } else if ($townshipID != '0' && $specialfeatureID == '0' &&  $subjectID == '0') {
            $query .= "ci.id = " . $id . " and  t.id in (" . $townshipID . ")  group by c.id";
            
        } else if ($townshipID != '0' && $specialfeatureID != '0' &&  $subjectID == '0') {
            $query .= "ci.id = " . $id . " and  t.id in (" . $townshipID . ") and spe.id in (" . $specialfeatureID . ")  group by c.id";
            
        } else if ($townshipID != '0' && $specialfeatureID == '0' &&  $subjectID != '0') {
            $query .= "ci.id = " . $id . " and  t.id in (" . $townshipID . ") and sub.id in (" . $subjectID . ")  group by c.id";
            
        } else if ($townshipID == '0' && $specialfeatureID != '0' &&  $subjectID == '0') {
            $query .= "ci.id = " . $id . " and   spe.id in (" . $specialfeatureID . ")  group by c.id";
            
        } else if ($townshipID == '0' && $specialfeatureID == '0' &&  $subjectID != '0') {
            $query .= "ci.id = " . $id . " and sub.id in (" . $subjectID . ") group by c.id";
            
        } else if ($townshipID == '0' && $specialfeatureID != '0' &&  $subjectID != '0') {
            $query .= "ci.id = " . $id . " and  spe.id in (" . $specialfeatureID . ")  and sub.id in (" . $subjectID . ") group by c.id";
            
        } else if ($townshipID != '0' && $specialfeatureID != '0' &&  $subjectID != '0') {
            $query .= "ci.id = " . $id . " and  t.id in (" . $townshipID . ") and spe.id in (" . $specialfeatureID . ")  and sub.id in (" . $subjectID . ") group by c.id";
            
        }
        $hos_data = DB::select($query);

        $spe_query = "SELECT spe.*,spej.customer_id from  special_features as spe join special_features_junctions as spej on spe.id = spej.special_feature_id";
        $specialfeature = DB::select($spe_query);
        $sub_query = "SELECT sub.*,subj.customer_id from  subjects as sub join subject_junctions as subj on sub.id = subj.subject_id";
        $subject = DB::select($sub_query);
        $timetable = DB::table('schedule')->get();

        return response()->json(array("hospital" => $hos_data, "timetable" => $timetable, "specialfeature" => $specialfeature, "subject" => $subject));
    }


    public function getSpecialFeatures($hos_data)
    { }

    public function getJobSearch()
    {
        //for city
        $id = $_GET['id'];

        //to check if township is check or not 
        $townshipID = $_GET['townshipID'];
        if ($townshipID[0] == '0' && count($townshipID) == 1) //get param value of hospitalsearch.vue and if value is 0 and count =1 , this condition is "No Check"
        {
            $townshipID = '0';
        } else if ($townshipID[0] == '0' && count($townshipID) > 1) { //if count > 1, this condition is  "Check and Remove an item of array [0] and implode array 
            unset($townshipID[0]);
            $townshipID = implode(',', $townshipID);
        } else {
            $townshipID = implode(',', $townshipID); // this condition is when array[0] has no '0'
        }


        //to check if occupation is check or not
        $occupationID = $_GET['occupationID'];

        if ($occupationID[0] == '0' && count($occupationID) == 1) {
            $occupationID = '0';
        } else if ($occupationID[0] == '0' && count($occupationID) > 1) {
            unset($occupationID[0]);
            $occupationID = implode(',', $occupationID);
        } else {
            $occupationID = implode(',', $occupationID);
        }



        //to check if employment status is check or not
        $empstatus = $_GET['empstatus'];

        if ($empstatus[0] === '0' && count($empstatus) === 1) {
            $empstatus = '0';
        } else if ($empstatus[0] === '0' && count($empstatus) > 1) {

            unset($empstatus[0]);
            $empstatus = implode(',', $empstatus);
        } else {
            $empstatus = implode(',', $empstatus);
        }

        $query = "SELECT j.id as jobid, j.*,c.*,n.*,h.*,
                 (CASE c.type_id WHEN '2' THEN CONCAT((500000+j.id),'-',LPAD(j.id, 4, '0')) ELSE CONCAT((200000+j.id),'-',LPAD(j.id, 4, '0')) END) as jobnum 
                  from  jobs as j
                  join customers as c on c.id = j.customer_id
                  left Join nursing_profiles As n on n.customer_id = c.id 
                  left Join hospital_profiles As h on h.customer_id = c.id 
                  left Join townships as t on t.id = j.township_id 
                  where ";

        if ($townshipID == '0' && $occupationID == '0' &&  $empstatus == '0') {
            $query .= "t.city_id =".$id;
             
        } else if ($townshipID != '0'  && $occupationID == '0' && $empstatus == '0') {
            $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.")";
       
        } else if ($townshipID != '0' && $occupationID != '0' && $empstatus == '0') {
            $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.")";
            
        } else if ($townshipID != '0' && $occupationID == '0' && $empstatus != '0') {
            $empstatus = explode(',', $empstatus);

            if (count($empstatus) == 4) {
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3)
            {
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'" ;
            }
            else if(count($empstatus) == 2){
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'" ;
            }
            else  {
 
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.employment_status = '".$empstatus[0] ."'";
            }
            
        } else if ($townshipID == '0' && $occupationID != '0' && $empstatus != '0') {
            $empstatus = explode(',', $empstatus);

            if (count($empstatus) == 4) {
                $query .= "t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query .= "t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query .= "t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query .= "t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")  and j.employment_status = '". $empstatus[0] ."'";
            }
            
        } else if ($townshipID == '0' && $occupationID == '0' && $empstatus != '0') {
            $empstatus = explode(',', $empstatus);

            if (count($empstatus) == 4) {
                $query .= "t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query .= "t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query .= "t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query .= "t.city_id =" .$id. " and j.employment_status = '". $empstatus[0] ."'";
            }

            
        } else if ($townshipID == '0' && $occupationID != '0' && $empstatus == '0') {
            $query .= "t.city_id =" .$id. " and j.occupation_id in (".$occupationID.")";

            
        } else if ($townshipID != '0' && $occupationID != '0' && $empstatus != '0') {
            $empstatus = explode(',', $empstatus);

            if (count($empstatus) == 4) {
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."' or j.employment_status = '". $empstatus[3] ."'" ;
            }
            else if(count($empstatus) == 3){
                $query .= " t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."' or j.employment_status = '". $empstatus[2] ."'";
            }
            else if(count($empstatus) == 2){
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."' or j.employment_status = '".$empstatus[1] ."'";
            }
            else{
                $query .= "t.city_id =" .$id. " and t.id in (".$townshipID.") and j.occupation_id in (".$occupationID.") and j.employment_status = '". $empstatus[0] ."'";
            }
    
        }

        $job_data = DB::select($query);

        return response()->json($job_data);
    }



    public function getCity(Request $request)
    {
        $id = $request->id;
        $getTownships = DB::table('townships')->where('city_id', $id)->get();
        return response()->json($getTownships);
    }
}
