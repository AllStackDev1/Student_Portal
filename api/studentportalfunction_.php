<?php

class StudentPortalFunction {

    function sign_in($sz_studentid, $sz_password){
        if($sz_studentid && $sz_password){
            $retVal = array('success' => true, 'sz_studentid' => 'GSIS09882', 'sz_studentname' => 'Chinedu Ekene Okpala', 'sz_class' => 'JSS 2', 'sz_schoolid' => 'GSISCHOOL');
            echo json_encode($retVal);
        }
    }

    function forget_password($sz_studentid, $sz_dob, $sz_mobile, $sz_email, $sz_newpass){
        if($sz_studentid && $sz_dob && $sz_newpass && $sz_email){
            $retVal = array('success' => true, 'szmessage' => 'A verification email has been send to '.$sz_email);
            echo json_encode($retVal);
            emailVerification_for_password_change($sz_studentid, $sz_newpass, $sz_email);
        }else
            if($sz_studentid && $sz_dob && $sz_newpass && $sz_mobile){
            $retVal = array('success' => true, 'szmessage' => 'A verification code has been send to '.$sz_mobile);
            echo json_encode($retVal);
            sz_mobileVerification_for_password_change($sz_studentid, $sz_newpass, $sz_mobile);
        }
    }

    function emailVerification_for_password_change($sz_studentid, $sz_email, $sz_newpass){
        if($sz_studentid && $sz_newpass && $sz_email) {
            $verification_code = '12345';
            $retVal = array('success' => true, 'verification_code' => $verification_code);
            //echo json_encode($retVal);
        }
    }

    function sz_mobileVerification_for_password_change($sz_studentid, $sz_mobile, $sz_newpass){
        if($sz_studentid && $sz_newpass && $sz_mobile) {
            $verification_code = '12345';
            $retVal = array('success' => true, 'szmessage' => 'Your Password Change Verification Code is: ' .$verification_code);
            //echo json_encode($retVal);
        }
    }

    function getDirectNotifications($sz_studentid, $szclass, $szschoolid){
        if($sz_studentid && $szclass && $szschoolid) {
            $studentname = 'Chinedu Ekene Okpala';
            $retVal = array(
                array('id' => '001', 'sztype' => 'Direct Message', 'szpost_date' => '16-04-2018','szfrom' => 'Head Teacher', 'szmessage' => 'Dear ' .$studentname. ', the school board has seen it fit to make you the Head Prefect of the school! Congratulations', 'sz_filename' => ''),
                array('id' => '002', 'sztype' => 'Direct Message', 'szpost_date' => '10-04-2018','szfrom' => 'Class Teacher', 'szmessage' => 'Dear ' .$studentname. ', the school board has seen it fit to make you the Head Prefect of the school! Congratulations', 'sz_filename' => 'Android TextBook.pdf')
            );
            echo json_encode($retVal);
        }
    }

    function getClassNotifications($szclass, $szschoolid){
        if($szclass || $szschoolid) {
            $retVal = array(
                array('id' => '003', 'sztype' => 'Class Anouncement', 'szpost_date' => '16-04-2018', 'szfrom' => 'Head Teacher','szmessage' => 'Dear students, the school will be going for holidays from Monday the 12th of march 2018 till Monday 2nd of April 2018, Pleaae enjoy your holiday and be save. Thanks Management', 'sz_filename' => ''),
                array('id' => '004', 'sztype' => 'Class Anouncement', 'szpost_date' => '10-04-2018', 'szfrom' => 'Class Teacher', 'szmessage' => 'Dear students, Please make sure you all submit your praticals file before Monday the 12th of March 2018. Thanks Mrs. Grace Kofi', 'sz_filename' => 'Android TextBook.pdf')
            );
            echo json_encode($retVal);

        }
    }

    function getGeneralNotifications($szschoolid){
        if($szschoolid) {
            $retVal = array(
                array('id' => '005', 'sztype' => 'General Anouncement', 'szpost_date' => '16-04-2018', 'szfrom' => 'Head Teacher','szmessage' => 'Dear students, the school will be going for holidays from Monday the 12th of march 2018 till Monday 2nd of April 2018, Pleaae enjoy your holiday and be save. Thanks Management', 'sz_filename' => ''),
                array('id' => '006', 'sztype' => 'General Anouncement', 'szpost_date' => '10-04-2018', 'szfrom' => 'Class Teacher', 'szmessage' => 'Dear students, Please make sure you all submit your praticals file before Monday the 12th of March 2018. Thanks Mrs. Grace Kofi', 'sz_filename' => 'Android TextBook.pdf')
            );
            echo json_encode($retVal);
        }
    }

    function subject_list($szclass, $szschoolid){
        // if($szclass && $szschoolid){
            $retVal = array(
                array('subjectid' => '001', 'subjectname' => 'English Language', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Part of Speech'), array('unit_id' => '02', 'unit_title' => 'Figures of Speech'))),
                array('subjectid' => '002', 'subjectname' => 'Mathematics', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Sets and Operations on set'), array('unit_id' => '02', 'unit_title' => 'Real number system'))),
                array('subjectid' => '003', 'subjectname' => 'Physics', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Velocity-TIme Graphs'), array('unit_id' => '02', 'unit_title' => 'Friction'))),
                array('subjectid' => '004', 'subjectname' => 'Chemistry', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Classification and Structure of matter'), array('unit_id' => '02', 'unit_title' => 'Chemical Reactions'))),
                array('subjectid' => '005', 'subjectname' => 'Biology', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Biology - The Studay of Life'), array('unit_id' => '02', 'unit_title' => 'The Cell')))
            );
            echo json_encode($retVal);
        // }
    }

    function lesson_plan($subjectid, $unit_id, $szclass, $schoolid){

        if($subjectid && $unit_id && $szclass && $schoolid){
            $video = 'CalledOut Music - My Prayer (Yahweh)  Official Music Video (128kbps).M4A';
            $audio = 'CalledOut Music - My Prayer (Yahweh)  Official Music Video (128kbps).mp3';
            $image = 'IMG-20150903-WA0001.jpg';
            $pdf = 'Information Technology Control and Audit Third Edition.pdf';
            $retVal = array('objectives' => '<p>Understand the concept of part of Speech</p><p>Understand the different part of speech</p>', 'media_sz_filename_url' => 'ikolilu/studentportal/v1.2/assets/' .$pdf, 'focus_reading' => 'nouns, verb, adverb');
            echo json_encode($retVal);
        }
    }

    function question_bank($szclass, $szschoolid){
        if($szclass && $szschoolid) {
            $retVal = array('results' => array(array('QnA' => 'ikolilu/studentportal/v1.2/assets/Information Technology Control and Audit Third Edition.pdf'), array('QnA' => 'ikolilu/studentportal/v1.2/assets/Android TextBook.pdf')));
            echo json_encode($retVal);
        }
    }

    function getClassSubjects($sz_sz_studentid, $sz_class, $sz_schoolid){
        if($sz_class && $sz_schoolid) {
            $retVal = array(
                array('sz_subjectid' => 'English Language', 'sz_subjectname' => 'English Language'),
                array('sz_subjectid' => 'Mathematics', 'sz_subjectname' => 'Mathematics'),
                array('sz_subjectid' => 'Inter Science', 'sz_subjectname' => 'Inter Science'),
                array('sz_subjectid' => 'Home Economics', 'sz_subjectname' => 'Home Economics'),
                array('sz_subjectid' => 'Intro Tech', 'sz_subjectname' => 'Intro Tech'),
                array('sz_subjectid' => 'Civil Education', 'sz_subjectname' => 'Civil Education'),
                array('sz_subjectid' => 'Franch Language', 'sz_subjectname' => 'Franch Language'),
                array('sz_subjectid' => 'Christain Religion Education', 'sz_subjectname' => 'Christain Religion Education'),
                array('sz_subjectid' => 'Fine Arts', 'sz_subjectname' => 'Fine Arts'),
                array('sz_subjectid' => 'Kinetics and Physical Education', 'sz_subjectname' => 'Kinetics and Physical Education')
            );
            echo json_encode($retVal);
        }
    }

    function lib_search($search_key, $search_cat, $sz_class, $sz_schoolid){
        if($sz_class && $search_key && $search_cat && $sz_schoolid) {
            $retVal = array(
                // array('success' => true, 'key' => $search_key, 'category' => $search_cat, 'items' => 'You Search for <b>'.$search_key.'</b> under <b>'.$search_cat. '</b> Category', 'totalCount' => '1')
                array('success' => false, 'key' => $search_key, 'category' => $search_cat, 'items' => 'You Search for '.$search_key.' which falls under '.$search_cat. ' Category', 'totalCount' => '0')
            );
            echo json_encode($retVal);
        }
    }

    function create_thread($subject, $post_topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $szclass, $schoolid){
        $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/forumdata.json";
        $arr_data = array();
        try
        {
            //Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            $thread_ids = array();
            $i = 0;
            while ($i < count($arr_data)) {
                if ($arr_data[$i]['sn'] == '0') {
                    array_push($thread_ids,$arr_data[$i]['thread_id']);
                }
                $i++;
            }
            $newthread_id = (int)$thread_ids[count($thread_ids)-1] + 1;

            $forumData = array(
                'thread_id'         => $newthread_id,
                'sn'                => "0",
                'subject'           => $subject,
                'topic'             => $post_topic,
                'post_title'        => $post_title,
                'post_text'         => $post_text,
                'orginal_poster'    => $orginal_poster,
                'orginal_posterid'  => $orginal_posterid,
                'post_date_time'    => $post_date_time,
                'user_signature'    => $user_signature,
                'votes'             => "0",
                'views'             => "0",
                'answers'           => "0",
                'szclass'           => $szclass,
                'schoolid'          => $schoolid
            );

            // Push user data to array
            array_push($arr_data,$forumData);

            //Convert updated array to JSON
            $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);

            //write json data into forumData.json sz_filename
            if(sz_filename_put_contents($myfilePath, $jsonData)){
                $retVal = array('status' => 'success', 'thread_id' => $newthread_id, 'status_text' => 'Thread Successfully Created');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Creating Thread');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    function get_threads_data($szclass, $schoolid){
        // phpinfo()
        $myfilePath = "http://localhost/ikolilu/studentportal/v1.2/assets/forumdata.json";

        try
        {
            //Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            $i = 0;
            $newarr = array();
            while ($i < count($arr_data)) {
                if($arr_data[$i]['sn'] == '0' && @$arr_data[$i]['szclass'] == $szclass && @$arr_data[$i]['schoolid'] == $schoolid){
                    // Push user data to array
                    array_push($newarr,$arr_data[$i]);
                }
                $i++;
            }
            //Convert updated array to JSON
            $retVal = json_encode($newarr, JSON_PRETTY_PRINT);
            if($retVal){
                echo $retVal;
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'No Record Found');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    function get_thread_data($thread_id, $szclass, $schoolid){
        $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/forumdata.json";
        try
        {
            //Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            $i = 0;
            $newarr = array();
            while ($i < count($arr_data)) {
                if($arr_data[$i]['thread_id'] == $thread_id && @$arr_data[$i]['szclass'] == $szclass && @$arr_data[$i]['schoolid'] == $schoolid){
                    // Push user data to array
                    array_push($newarr,$arr_data[$i]);
                }
                $i++;
            }
            //Convert updated array to JSON
            $retVal = json_encode($newarr, JSON_PRETTY_PRINT);
            if($retVal){
                echo $retVal;
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'No Record Found');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    function quick_reply_thread($thread_id, $sn, $subject, $topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $views, $answers, $szclass, $schoolid){
        $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/forumdata.json";
        $arr_data = array();
        try
        {
            //Get form data
            $forumData = array(
                'thread_id'         => $thread_id,
                'sn'                => (string) $sn,
                'subject'           => $subject,
                'topic'             => $topic,
                'post_title'        => $post_title,
                'post_text'         => $post_text,
                'orginal_poster'    => $orginal_poster,
                'orginal_posterid'  => $orginal_posterid,
                'post_date_time'    => $post_date_time,
                'user_signature'    => $user_signature,
                'votes'             => "0",
                'views'             => $views,
                'answers'           => $answers,
                'szclass'           => $szclass,
                'schoolid'          => $schoolid
            );

            //Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            // Update Thread answer field
            foreach ($arr_data as $key => $value) {
                if ($value['thread_id'] == $thread_id) {
                    $arr_data[$key]['answers'] = (string) $answers;
                }
            }

            // Push user data to array
            array_push($arr_data,$forumData);

            //Convert updated array to JSON
            $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);

            //write json data into forumData.json sz_filename
            if(sz_filename_put_contents($myfilePath, $jsonData)){
                $retVal = array('status' => 'success', 'status_text' => 'Reply Successfully Posted');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Posting Reply');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    function vote_update($thread_id, $sn, $vote){

        $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/forumdata.json";

        try {
            //Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);
            foreach ($arr_data as $key => $value) {
                if ($value['sn'] == $sn && $value['thread_id'] == $thread_id) {
                    $arr_data[$key]['votes'] = (string) $vote;
                }
            }
            //Convert updated array to JSON
            $newJsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
            //write json data into forumData.json sz_filename
            if(sz_filename_put_contents($myfilePath, $newJsonData)){
                $retVal = array('status' => 'success', 'status_text' => 'Votes Count Successfully Updated');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Updating Votes Count');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    function check_views($ip, $thread_id, $sz_studentid, $szclass, $schoolid){
        if($ip && $thread_id) {
            $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/threadViews.json";
            $arr_data = array();
            try
            {
                //Get data from existing json sz_filename
                $jsonData = file_get_contents($myfilePath);

                // converts json data into array
                $arr_data = json_decode($jsonData, true);

                $i = 0;
                while ($i < count($arr_data)) {
                    if ($arr_data[$i]['ip'] == $ip && $arr_data[$i]['thread_id'] == $thread_id) {
                        return;
                    }
                    $i++;
                }

                //Get forum data
                $forumData = array(
                    'thread_id'         => $thread_id,
                    'ip'                => $ip,
                    'sz_studentid'         => $sz_studentid,
                    'szclass'           => $szclass,
                    'schoolid'          => $schoolid
                );

                // Push user data to array
                array_push($arr_data,$forumData);

                //Convert updated array to JSON
                $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);

                //write json data into forumData.json sz_filename
                if(sz_filename_put_contents($myfilePath, $jsonData)){
                     return $this->update_views_count($thread_id);
                } else{
                    $retVal = array('status' => 'false', 'status_text' => 'Error While Saving IP');
                    echo json_encode($retVal);
                }
            }
            catch (Exception $e) {
                echo 'Caught exception: ',  $e->getszmessage(), "\n";
            }
        }
    }

    function update_views_count($thread_id){

        $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/threadViews.json";
        try
        {
            // Get data from existing json sz_filename
            $jsonData = file_get_contents($myfilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            // convert key to array data
            $thread_ids = array_column($arr_data, 'thread_id');
            // Set Count Formula
            $counts = array_count_values($thread_ids);
            if($counts[$thread_id]){
               $views = $counts[$thread_id];
                $myfilePath = "http://www.ikolilu.com/studentportal/v1.2/assets/forumdata.json";
                try
                {
                    // Get data from existing json sz_filename
                    $jsonData = file_get_contents($myfilePath);

                    // converts json data into array
                    $arr_data = json_decode($jsonData, true);
                    foreach ($arr_data as $key => $value) {
                        if ($value['thread_id'] == $thread_id) {
                            $arr_data[$key]['views'] = (string) $views;
                        }
                    }
                    //Convert updated array to JSON
                    $newJsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
                    //write json data into forumData.json sz_filename
                    if(sz_filename_put_contents($myfilePath, $newJsonData)){
                        $retVal = array('status' => 'success', 'status_text' => 'Views Count Successfully Updated');
                        echo json_encode($retVal);
                    } else{
                        $retVal = array('status' => 'false', 'status_text' => 'Error While Updating Views Count');
                        echo json_encode($retVal);
                    }
                }
                catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getszmessage(), "\n";
                }
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getszmessage(), "\n";
        }
    }

    //PARENT PORTAL TEST
    function getClasses ($u_uschoolid=''){
        $ClassJson = '
             [
                "CRECHE",
                "PRENURSERY",
                "NURSERY 1",
                "NURSERY 2"
             ]
        ';

        echo $ClassJson;
    }
    function PreSchoolSubSubjectRemarks($u_wardidentity='',$u_classid='',$u_uschoolid='',$stu_examstype='',$stu_term=''){
        $gardeArrayList = array(
            array('subsubject' => 'The pupil could identify letters from E to H', 'remark' => 'Excellent'),
            array('subsubject' => 'The pupil could write letters ``a`` and ``b``', 'remark' => 'Very Good'),
            array('subsubject' => 'The pupil could trace given object to build his/her motor skills', 'remark' => 'NEEDS IMPROVEMENT'),
            array('subsubject' => 'The pupil could trace numerals from 0-9', 'remark' => 'SOMETIMES')
        );

        echo json_encode($gardeArrayList);
    }
    function PerSchoolDailyReport($u_wardidentity='',$u_classid='',$u_timestamp="",$u_uschoolid='') {
        if ($u_timestamp == "") {
            echo json_encode(array('Error' => 'Error Please Select a date'));
            return;
        }
        $DailyReportArrayList = array(
            array('title' => 'Number Work', 'comment' => 'He was able to identify 3-5.'),
            array('title' => 'Literacy/Language', 'comment' => 'He was able to two three letter words.'),
            array('title' => 'Gross Motor/P.E', 'comment' => 'He can move in sliding manner.'),
            array('title' => 'Eating Habit', 'comment' => 'Was unable to use his spoon.'),
            array('title' => 'Fruit', 'comment' => 'Eat all his banana.'),
            array('title' => 'Evaluation', 'comment' => 'Daniel is very creative and enjoys outdoor play.'),
            array('title' => 'Good Morals', 'comment' => 'He was obedient all through the day'),
            array('title' => 'Library Time/Story Time', 'comment' => 'Excellent'),
            array('teacher_comment' => 'Today he has been playful. He ask for water a lot today, keep an eye to see if he gettng dehydrated.')
        );

        echo json_encode($DailyReportArrayList);
    }

}
