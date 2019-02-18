<?php
    
    function login($studentid, $student_pass){
        if($studentid && $student_pass){
            $retVal = array('success' => true, 'studentid' => $studentid, 'studentname' => 'Chinedu Ekene Okpala', 's_class' => 'JSS 2', 's_schoolid' => 'GSISCHOOL', 'mge_notify' => '0', 'announ_notify' => '0');
            echo json_encode($retVal);
        }
    }

    function forget_password($studentid, $student_dob, $mobile, $email, $student_newpass){
        if($studentid && $student_dob && $student_newpass && $email){
            $retVal = array('success' => true, 'message' => 'A verification email has been send to the email provided');
            echo json_encode($retVal);
            emailVerification_for_password_change($studentid, $student_newpass, $email);
        }else
            if($studentid && $student_dob && $student_newpass && $mobile){
            $retVal = array('success' => true, 'message' => 'A verification code has been send to the mobile number provided');
            echo json_encode($retVal);
            mobileVerification_for_password_change($studentid, $student_newpass, $mobile);
        }
    }

    function emailVerification_for_password_change($studentid, $email, $student_newpass){
        if($studentid && $student_newpass && $email) {
            $verification_code = '12345';
            $retVal = array('success' => true, 'verification_code' => $verification_code);
            //echo json_encode($retVal);
        }
    }

    function mobileVerification_for_password_change($studentid, $mobile, $student_newpass){
        if($studentid && $student_newpass && $mobile) {
            $verification_code = '12345';
            $retVal = array('success' => true, 'message' => 'Your Password Change Verification Code is: ' .$verification_code);
            //echo json_encode($retVal);
        }
    }

    function dir_message($studentid, $s_class, $s_schoolid){
        if($studentid && $s_class && $s_schoolid) {
            $studentname = 'Chinedu Ekene Okpala';
            $retVal = array('messages' => array(
                array('message_id' => '001', 'message_date' => '09-March-2018', 'message_from' => 'Head Teacher', 'message_status' => 'read', 'message' => 'Dear ' .$studentname. ', the school board has seen it fit to make you the Head Prefect of the school! Congratulations'),
                array('message_id' => '002', 'message_date' => '10-March-2018', 'message_from' => 'Class Teacher', 'message_status' => 'unread', 'message' => 'Dear ' .$studentname. ', the school board has seen it fit to make you the Head Prefect of the school! Congratulations')
            ));
            echo json_encode($retVal);
        }
    }

    function announcements($s_class, $s_schoolid){
        if($s_class || $s_schoolid) {
            $retVal = array('announcements' => array(
                array('announcement_id' => '001', 'announcement_date' => '09-March-2018', 'announcement_from' => 'Head Teacher', 'announcement_status' => 'read', 'announcement' => 'Dear students, the school will be going for holidays from Monday the 12th of march 2018 till Monday 2nd of April 2018, Pleaae enjoy your holiday and be save. Thanks Management'),
                array('announcement_id' => '002', 'announcement_date' => '10-March-2018', 'announcement_from' => 'Class Teacher', 'announcement_status' => 'unread', 'announcement' => 'Dear students, Please make sure you all submit your praticals files before Monday the 12th of March 2018. Thanks Mrs. Grace Kofi')
            ));
            echo json_encode($retVal);
        }
    }

    function subject_list($s_class, $s_schoolid){
        if($s_class && $s_schoolid){
            $retVal = array(
                array('subjectid' => '001', 'subjectname' => 'English Language', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Part of Speech'), array('unit_id' => '02', 'unit_title' => 'Figures of Speech'))),
                array('subjectid' => '002', 'subjectname' => 'Mathematics', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Sets and Operations on set'), array('unit_id' => '02', 'unit_title' => 'Real number system'))),
                array('subjectid' => '003', 'subjectname' => 'Physics', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Velocity-TIme Graphs'), array('unit_id' => '02', 'unit_title' => 'Friction'))),
                array('subjectid' => '004', 'subjectname' => 'Chemistry', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Classification and Structure of matter'), array('unit_id' => '02', 'unit_title' => 'Chemical Reactions'))),
                array('subjectid' => '005', 'subjectname' => 'Biology', 'units' => array(array('unit_id' => '01', 'unit_title' => 'Biology - The Studay of Life'), array('unit_id' => '02', 'unit_title' => 'The Cell')))
            );
            echo json_encode($retVal);
        }
    }

    function lesson_plan($s_class, $subjectid, $unit_id, $s_schoolid){
        if($s_class && $subjectid && $unit_id && $s_schoolid){
            $video = 'CalledOut Music - My Prayer (Yahweh)  Official Music Video (128kbps).M4A';
            $audio = 'CalledOut Music - My Prayer (Yahweh)  Official Music Video (128kbps).mp3';
            $image = 'IMG-20150903-WA0001.jpg';
            $pdf = 'Information Technology Control and Audit Third Edition.pdf';
            $retVal = array('objectives' => '<p>Understand the concept of part of Speech</p><p>Understand the different part of speech</p>', 'media_file_url' => 'ikolilu/studentportal/v1.2/assets/' .$pdf, 'focus_reading' => 'nouns, verb, adverb');
            echo json_encode($retVal);
        }
    }

    function question_bank($s_class, $s_schoolid){
        if($s_class && $s_schoolid) {
            $retVal = array('results' => array(array('QnA' => 'ikolilu/studentportal/v1.2/assets/Information Technology Control and Audit Third Edition.pdf'), array('QnA' => 'ikolilu/studentportal/v1.2/assets/Android TextBook.pdf')));
            echo json_encode($retVal);
        }
    }

    function lib_search($s_class, $search_key, $search_cat, $s_schoolid){
        if($s_class && $search_key && $search_cat && $s_schoolid) {
            $retVal = array('search_key' => $search_key, 'subject_cat' => $search_cat, 'results' => array(
                array('result' => 'You Search for '.$search_key.' which falls under '.$search_cat. ' Category'),
                array('result' => 'You Search for '.$search_key.' which falls under '.$search_cat. ' Category'))
            );
            echo json_encode($retVal);
        }
    }

    function create_thread($subject, $post_topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $szclass, $schoolid){
        $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/forumdata.json";
        $arr_data = array();
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

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

            //write json data into forumData.json file
            if(file_put_contents($myFilePath, $jsonData)){
                $retVal = array('status' => 'success', 'thread_id' => $newthread_id, 'status_text' => 'Thread Successfully Created');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Creating Thread');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function get_threads_data($szclass, $schoolid){
        $myFilePath = "http://localhost/iKolilu/studentportal/v1.2/assets/forumdata.json";
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

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
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function get_thread_data($thread_id, $szclass, $schoolid){
        $myFilePath = "http://localhost/iKolilu/studentportal/v1.2/assets/forumdata.json";
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

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
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function write_forum_data($thread_id, $sn, $subject, $topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $views, $answers, $szclass, $schoolid){
        $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/forumdata.json";
        $arr_data = array();
        try
        {
            //Get form data
            $forumData = array(
                'thread_id'         => $thread_id,
                'sn'                => $sn,
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

            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            // Update Thread answer field
            foreach ($arr_data as $key => $value) {
                if ($value['thread_id'] == $thread_id) {
                    $arr_data[$key]['answers'] = $answers;
                }
            }

            // Push user data to array
            array_push($arr_data,$forumData);

            //Convert updated array to JSON
            $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);

            //write json data into forumData.json file
            if(file_put_contents($myFilePath, $jsonData)){
                $retVal = array('status' => 'success', 'status_text' => 'Reply Successfully Posted');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Posting Reply');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function vote_update($thread_id, $sn, $vote){
        $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/forumdata.json";
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);
            foreach ($arr_data as $key => $value) {
                if ($value['sn'] == $sn && $value['thread_id'] == $thread_id) {
                    $arr_data[$key]['votes'] = $vote;
                }
            }
            //Convert updated array to JSON
            $newJsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
            //write json data into forumData.json file
            if(file_put_contents($myFilePath, $newJsonData)){
                $retVal = array('status' => 'success', 'status_text' => 'Votes Count Successfully Updated');
                echo json_encode($retVal);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Updating Votes Count');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function views($ip, $thread_id, $studentid, $szclass, $schoolid){
        $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/threadViews.json";
        $arr_data = array();
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            $i = 0;
            while ($i < count($arr_data)) {
                if ($arr_data[$i]['ip'] == $ip && $arr_data[$i]['thread_id'] == $thread_id) {
                    exit();
                }
                $i++;
            }

            //Get forum data
            $forumData = array(
                'thread_id'         => $thread_id,
                'ip'                => $ip,
                'studentid'         => $studentid,
                'szclass'           => $szclass,
                'schoolid'          => $schoolid
            );

            // Push user data to array
            array_push($arr_data,$forumData);

            //Convert updated array to JSON
            $jsonData = json_encode($arr_data, JSON_PRETTY_PRINT);

            //write json data into forumData.json file
            if(file_put_contents($myFilePath, $jsonData)){
                update_views_count($thread_id);
            } else{
                $retVal = array('status' => 'false', 'status_text' => 'Error While Saving IP');
                echo json_encode($retVal);
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function update_views_count($thread_id){
        $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/threadViews.json";
        try
        {
            //Get data from existing json file
            $jsonData = file_get_contents($myFilePath);

            // converts json data into array
            $arr_data = json_decode($jsonData, true);

            // convert key to array data
            $thread_ids = array_column($arr_data, 'thread_id');
            // Set Count Formula
            $counts = array_count_values($thread_ids);
            if($counts[$thread_id]){
               $views = $counts[$thread_id];
                $myFilePath = "C:/xampp/htdocs/iKolilu/studentportal/v1.2/assets/forumdata.json";
                try
                {
                    //Get data from existing json file
                    $jsonData = file_get_contents($myFilePath);

                    // converts json data into array
                    $arr_data = json_decode($jsonData, true);
                    foreach ($arr_data as $key => $value) {
                        if ($value['thread_id'] == $thread_id) {
                            $arr_data[$key]['views'] = (string) $views;
                        }
                    }
                    //Convert updated array to JSON
                    $newJsonData = json_encode($arr_data, JSON_PRETTY_PRINT);
                    //write json data into forumData.json file
                    if(file_put_contents($myFilePath, $newJsonData)){
                        $retVal = array('status' => 'success', 'status_text' => 'Views Count Successfully Updated');
                        echo json_encode($retVal);
                    } else{
                        $retVal = array('status' => 'false', 'status_text' => 'Error While Updating Views Count');
                        echo json_encode($retVal);
                    }
                }
                catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }