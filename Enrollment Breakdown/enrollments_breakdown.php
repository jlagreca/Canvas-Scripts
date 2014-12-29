<?php
    require_once './Requests/library/Requests.php';
    ini_set('auto_detect_line_endings', TRUE);
    Requests::register_autoloader();
    $headers = array('Authorization' => 'Bearer TOKENGOESHERE');
    $file = fopen('courses.csv','r');
    $outputcompleted = fopen('output_breakdown/completed.csv','w+');
    $outputactive = fopen('output_breakdown/active_6.csv','w+');
    $outputinactive = fopen('output_breakdown/inactive.csv','w+');
    $outputrejected = fopen('output_breakdown/rejected.csv','w+');
    $outputdeleted = fopen('output_breakdown/deleted.csv','w+');
    $outputinvited = fopen('output_breakdown/invited.csv','w+');
    $outputnotcreated = fopen('output_breakdown/notcreated.csv','w+');
    $outputspecificdate = fopen('output_breakdown/specificdate.csv','w+');
    $outputcurrentandconcluded = fopen('output_breakdown/current_and_concluded.csv','w+');
    fputcsv($outputcompleted,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputactive,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputinactive,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputrejected,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputdeleted,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputinvited,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputnotcreated,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputspecificdate,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    fputcsv($outputcurrentandconcluded,array('user_name','end_at','sis_course_id','enrollment_state','updated_at'));
    while(($line = fgetcsv($file)) !== False){
        $url = 'https://DOMAINGOESHERE.instructure.com/api/v1/courses/sis_course_id:'.$line[0].'/enrollments';
        $res = Requests::get($url, $headers);
        $res_json = json_decode($res->body);
        foreach ($res_json as $item) {
            $status = $item->enrollment_state;
            switch ($status) {
                case 'inactive':
                    $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
                    fputcsv($outputinactive,$line);
                    print 'Inactive';
                    break;
                case 'rejected':
                    $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
                    fputcsv($outputrejected,$line);
                    print 'Rejected';
                    break;
                case 'deleted':
                    $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
                    fputcsv($outputdeleted,$line);
                    print 'deleted';
                    break;
                case 'invited';
                $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
                fputcsv($outputinvited,$line);
                print 'invited';
                break;
            case 'creation_pending';
            $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
            fputcsv($outputnotcreated,$line);
            print 'creation pending';
            break;
        case 'current_and_concluded';
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputcurrentandconcluded,$line);
        print 'creation pending';
        break;
    case 'completed';
    fputcsv($outputcompleted,$line);
    echo 'Completed';
    break;
case 'active';
echo '.';
break;
}

}

}

fclose($file);
  
   /* if($item->enrollment_state=='completed'){
 
        $line = array($item->user_name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputcompleted,$line);
        echo 'Completed';
    }

  
    elseif ($item->enrollment_state=='inactive'){
      
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputinactive,$line);
        print 'Inactive';
    }

    elseif ($item->enrollment_state=='rejected'){
        
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputrejected,$line);
        print 'Rejected';
    }

      elseif ($item->enrollment_state=='deleted'){
       
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputdeleted,$line);
        print 'deleted';
    }

    elseif ($item->enrollment_state=='invited'){
     
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputinvited,$line);
        print 'invited';
    }

     elseif ($item->enrollment_state=='creation_pending'){
        
        $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputnotcreated,$line);
        print 'creation pending';
    }

    elseif ($item->enrollment_state=='completed' AND strpos($item->end_date,'2014-12-19' !== false)) {
    $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputspecificdate,$line);
        print 'creation pending';


    }
  elseif ($item->enrollment_state=='current_and_concluded') {
    $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputcurrentandconcluded,$line);
        print 'creation pending';

    }


   elseif ($item->enrollment_state=='active'){
       
       // $line = array($item->user->name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
       // fputcsv($outputactive,$line);
   ///     print '.';
   }
*/




