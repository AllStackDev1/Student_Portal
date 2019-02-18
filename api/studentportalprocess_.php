<?php

require_once 'studentportalfunction_.php';

class StudentPortalProcess extends StudentPortalFunction{

	protected function Login() {

        $sz_studentid  = $this->inputdata->{"sz_studentid"};
        $sz_password   = $this->inputdata->{"sz_password"};
	    
	    return $this->sign_in($sz_studentid, $sz_password);
	}

	protected function ForgetPassword() {

	    $sz_studentid   = $this->inputdata->{"studentid"};
        $sz_dob        = $this->inputdata->{"student_dob"};
        $sz_mobile     = $this->inputdata->{"mobile"};
        $sz_email      = $this->inputdata->{"email"};
        $sz_newpass    = $this->inputdata->{"student_newpass"};
	    
	    return $this->forget_password($sz_studentid, $sz_dob, $sz_mobile, $sz_email, $sz_newpass);
	}

	protected function DirectNotifications() {

		$sz_studentid      = $this->inputdata->{"studentid"};
		$szclass        = $this->inputdata->{"szclass"};
		$szschoolid     = $this->inputdata->{"szschoolid"};

	    return $this->getDirectNotifications($sz_studentid, $szclass, $szschoolid);
	}

	protected function ClassNotifications() {

        $szclass     	= $this->inputdata->{"szclass"};
        $szschoolid    	= $this->inputdata->{"szschoolid"};
	    
	    return $this->getClassNotifications($szclass, $szschoolid);
	}

	protected function GeneralNotifications() {

        $szschoolid    	= $this->inputdata->{"szschoolid"};
	    
	    return $this->getGeneralNotifications($szschoolid);
	}

	protected function SubjectList() {

        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};
	    
	    return $this->subject_list($szclass, $schoolid);
	}

	protected function LessonPlan() {

		$subjectid      = $this->inputdata->{"subjectid"};
		$unit_id        = $this->inputdata->{"unit_id"};
        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};
	    
		return $this->lesson_plan($subjectid, $unit_id, $szclass, $schoolid);
	}

	protected function QuestionBank() {

        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};
	    
	    return $this->question_bank($szclass, $schoolid);
	}

	protected function SearchLibraryBooks() {

		$search_key     = $this->inputdata->{"search_key"};
		$search_cat     = $this->inputdata->{"search_cat"};
        $sz_class     	= $this->inputdata->{"sz_class"};
        $sz_schoolid    = $this->inputdata->{"sz_schoolid"};
	    
	    return $this->lib_search($search_key, $search_cat, $sz_class, $sz_schoolid);
	}

	protected function GetThreadData() {

	    $thread_id      = $this->inputdata->{"thread_id"};
        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};
	    
	    return $this->get_thread_data($thread_id, $szclass, $schoolid);
	}

	protected function GetThreadsData() {

        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};
	    
	    return $this->get_threads_data($szclass, $schoolid);
	}

	protected function CreateThread() {
		$subject            = $this->inputdata->{"subject"};
		$post_topic         = $this->inputdata->{"post_topic"};
		$post_title         = $this->inputdata->{"post_title"};
		$post_text          = $this->inputdata->{"post_text"};
		$orginal_poster     = $this->inputdata->{"orginal_poster"};
		$orginal_posterid   = $this->inputdata->{"orginal_posterid"};
		$post_date_time     = $this->inputdata->{"post_date_time"};
		$user_signature     = $this->inputdata->{"user_signature"};
		$szclass            = $this->inputdata->{"szclass"};
		$schoolid           = $this->inputdata->{"schoolid"};

		return $this->create_thread($subject, $post_topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $szclass, $schoolid);
	}

	protected function QuickReplyThread() {
            
        $thread_id   		= $this->inputdata->{"thread_id"};
        $sn                 = $this->inputdata->{"sn"};
        $subject            = $this->inputdata->{"subject"};
        $topic              = $this->inputdata->{"topic"};
        $post_title         = $this->inputdata->{"post_title"};
        $post_text          = $this->inputdata->{"post_text"};
        $orginal_poster     = $this->inputdata->{"orginal_poster"};
        $orginal_posterid   = $this->inputdata->{"orginal_posterid"};
        $post_date_time     = $this->inputdata->{"post_date_time"};
        $user_signature     = $this->inputdata->{"user_signature"};
        $views              = $this->inputdata->{"views"};
        $answers            = $this->inputdata->{"answers"};
        $szclass     		= $this->inputdata->{"szclass"};
        $schoolid    		= $this->inputdata->{"schoolid"};

		return $this->quick_reply_thread($thread_id, $sn, $subject, $topic, $post_title, $post_text, $orginal_poster, $orginal_posterid, $post_date_time, $user_signature, $views, $answers, $szclass, $schoolid);
	}

	protected function VoteUpdate() {

		$thread_id 	= $this->inputdata->{"thread_id"};
		$sn 		= $this->inputdata->{"sn"};
		$vote 		= $this->inputdata->{"vote"};

		return $this->vote_update($thread_id, $sn, $vote);
	}

	protected function Views() {

	    $ip          	= $this->inputdata->{"ip"};
        $thread_id   	= $this->inputdata->{"thread_id"};
        $sz_studentid   = $this->inputdata->{"studentid"};
        $szclass     	= $this->inputdata->{"szclass"};
        $schoolid    	= $this->inputdata->{"schoolid"};

		return $this->check_views($ip, $thread_id, $sz_studentid, $szclass, $schoolid);
	}

	protected function ClassSubjects() {

        $sz_studentid   = $this->inputdata->{"sz_studentid"};
        $sz_class     	= $this->inputdata->{"sz_class"};
        $sz_schoolid    = $this->inputdata->{"sz_schoolid"};

		return $this->getClassSubjects($sz_studentid, $sz_class, $sz_schoolid);
	}
//PARENT PORTAL TEST
    protected function GetPreschoolClasses(){
        $u_uschoolid          = $this->inputdata->{"szschoolid"};;

        return $this->getClasses($u_uschoolid);
    }
	protected function GetPreSchoolSubjectRemarks(){
    	$u_wardidentity       = $this->inputdata->{"sz_wardid"};
        $u_classid            = $this->inputdata->{"szclassid"};
        $u_uschoolid          = $this->inputdata->{"szschoolid"};
        $stu_examstype        = $this->inputdata->{"sz_examtype"};
        $stu_term             = $this->inputdata->{"sz_term"};
         
        return $this->PreSchoolSubSubjectRemarks($u_wardidentity,$u_classid,$u_uschoolid,$stu_examstype,$stu_term);
    }
	protected function GetPreSchoolDailyReport(){
    	$u_wardidentity       = $this->inputdata->{"sz_wardid"};
        $u_classid            = $this->inputdata->{"szclassid"};
        $u_timestamp          = $this->inputdata->{"sztimestamp"};
        $u_uschoolid          = $this->inputdata->{"szschoolid"};
        $stu_examstype        = $this->inputdata->{"sz_examtype"};
        $stu_term             = $this->inputdata->{"sz_term"};
         
        return $this->PerSchoolDailyReport($u_wardidentity,$u_classid,$u_timestamp,$u_uschoolid);
    }

}
