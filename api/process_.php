<?php
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

require_once 'ikoliluSPAPI_.php';
require_once 'function_.php';

// client request..
$apiPathURL = trim($_SERVER['REQUEST_URI']);

$construct = new CreateFunction($apiPathURL);

$FunctionName = $construct->GetEndPoint();

$db = new mysqli('localhost','root', '','');

    switch(trim($FunctionName)) {
        case 'Login':
            $studentid          = $_POST['studentid'];
            $student_pass       = $_POST['student_pass'];
            return login($studentid, $student_pass);
            break;
        case 'ForgetPassword':
            $studentid          = $_POST['studentid'];
            $student_dob        = $_POST['student_dob'];
            $mobile             = $_POST['mobile'];
            $email              = $_POST['email'];
            $student_newpass    = $_POST['student_newpass'];
            return forget_password($studentid, $student_dob, $mobile, $email, $student_newpass);
            break;
        case 'DirMessage':
            $studentid      = $_POST['studentid'];
            $s_class        = $_POST['s_class'];
            $s_schoolid     = $_POST['s_schoolid'];
            return dir_message($studentid, $s_class, $s_schoolid);
            break;
        case 'Announcements':
            $s_class        = $_POST['s_class'];
            $s_schoolid     = $_POST['s_schoolid'];
            return announcements($s_class, $s_schoolid);
            break;
        case 'SubjectList':
            $s_class            = $_POST['s_class'];
            $s_schoolid         = $_POST['s_schoolid'];
            return subject_list($s_class, $s_schoolid);
            break;
        case 'LessonPlan':
            $s_class        = $_POST['s_class'];
            $subjectid      = $_POST['subjectid'];
            $unit_id        = $_POST['unit_id'];
            $s_schoolid     = $_POST['s_schoolid'];
            return lesson_plan($s_class, $subjectid, $unit_id, $s_schoolid);
            break;
        case 'QuestionBank':
            $s_class        = $_POST['s_class'];
            $s_schoolid     = $_POST['s_schoolid'];
            return question_bank($s_class, $s_schoolid);
            break;
        case 'LibSearch':
            $szclass        = $_POST['szclass'];
            $search_key     = $_POST['search_key'];
            $search_cat     = $_POST['search_cat'];
            $schoolid       = $_POST['schoolid'];
            return lib_search($szclass, $search_key, $search_cat, $schoolid);
            break;
        case 'CreateThread':

            $request_body = file_get_contents('php://input');
            $params = json_decode($request_body);

            $subject            = @$params->subject;
            $post_topic         = @$params->post_topic;
            $post_title         = @$params->post_title;
            $post_text          = @$params->post_text;
            $orginal_poster     = @$params->orginal_poster;
            $orginal_posterid   = @$params->orginal_posterid;
            $post_date_time     = @$params->post_date_time;
            $user_signature     = @$params->user_signature;
            $szclass            = @$params->szclass;
            $schoolid           = @$params->schoolid;

            if ($szclass|| $schoolid) {
                return create_thread($subject, $post_topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $szclass, $schoolid);
            }

            break;
        case 'GetThreadsData':

            $szclass        = $_REQUEST['szclass'];
            $schoolid       = $_REQUEST['schoolid'];
            
            return get_threads_data($szclass, $schoolid);
            
            break;
        case 'GetThreadData':

            $thread_id      = $_REQUEST['thread_id'];
            $szclass        = $_REQUEST['szclass'];
            $schoolid       = $_REQUEST['schoolid'];
            
            return get_thread_data($thread_id, $szclass, $schoolid);
            
            break;
        case 'WriteForumData':

            $request_body = file_get_contents('php://input');
            $params = json_decode($request_body);

            $thread_id          = @$params->thread_id;
            $sn                 = @$params->sn;
            $subject            = @$params->subject;
            $topic              = @$params->topic;
            $post_title         = @$params->post_title;
            $post_text          = @$params->post_text;
            $orginal_poster     = @$params->orginal_poster;
            $orginal_posterid   = @$params->orginal_posterid;
            $post_date_time     = @$params->post_date_time;
            $user_signature     = @$params->user_signature;
            $views              = @$params->views;
            $answers            = @$params->answers;
            $szclass            = @$params->szclass;
            $schoolid           = @$params->schoolid;


            if ($szclass|| $schoolid) {
                return write_forum_data($thread_id, $sn, $subject, $topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $views, $answers, $szclass, $schoolid);
            }
            
            break;
        case 'VoteUpdate':

            $request_body = file_get_contents('php://input');
            $params = json_decode($request_body);

            $thread_id      = $params->thread_id;
            $sn             = $params->sn;
            $vote           = $params->vote;

            return vote_update($sn, $thread_id, $vote);

            break;
        case 'Views':
            $request_body = file_get_contents('php://input');
            $object = json_decode($request_body);

            $ip            = @$object->ip;
            $thread_id     = @$object->thread_id;
            $studentid     = @$object->studentid;
            $szclass       = @$object->szclass;
            $schoolid      = @$object->schoolid;

            if ($szclass || $schoolid) {
                return views($ip, $thread_id, $studentid, $szclass, $schoolid);
            }

            break;
        default:
            $retVal = array('success' => false, 'message' => 'unknown or missing end point');
            echo json_encode($retVal);
    }
