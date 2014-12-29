<?php
 require_once './Requests/library/Requests.php'; //change this
    ini_set('max_execution_time', 0); //300 seconds = 5 minutes

    ini_set("display_errors", 1);
    ini_set('auto_detect_line_endings', TRUE);
    Requests::register_autoloader();
    $headers = array('Authorization' => 'Bearer TOKENGOESHERE'); // Change the token
    $file = fopen('courses.csv','r');
    $directory = 'output_by_type_2';
    $dirMode = 0777;
    mkdir($directory, $dirMode, true);
    $outputcompleted = fopen($directory.'completed.csv','w+');
    $outputactive = fopen($directory.'/'.'active.csv','w+');
    $outputinactive = fopen($directory.'/'.'inactive.csv','w+');
    $outputrejected = fopen($directory.'/'.'rejected.csv','w+');
    $outputdeleted = fopen($directory.'/'.'deleted.csv','w+');
    $outputinvited = fopen($directory.'/'.'invited.csv','w+');
    $outputinvited = fopen($directory.'/'.'invited.csv','w+');
    $outputnotcreated = fopen($directory.'/'.'notcreated.csv','w+');
    $outputspecificdate = fopen($directory.'/'.'specificdate.csv','w+');
    $outputcurrentandconcluded = fopen($directory.'/'.'current_and_concluded.csv','w+');
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


if($item->enrollment_state=='active'){
 
        //$line = array($item->user_name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        //fputcsv($outputcompleted,$line);
        echo '.';
    }


 else {

 $line = array($item->user_name,$item->end_date,$item->sis_course_id, $item->enrollment_state, $item->updated_at);
        fputcsv($outputcompleted,$line);
        echo '+';

 }   
            

}
}


fclose($file);
