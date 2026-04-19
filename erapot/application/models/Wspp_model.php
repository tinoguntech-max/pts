<?php
class wspp_model extends CI_Model {
	private $client;
	private $sessid;
	private $sesskey;
	
	public $res;
	
	public function __construct(){
		require_once ('wspp/classes/mdl_soapserverrest.php');
		$this->client = new mdl_soapserverrest();
		//$this->client->setFormatout = "json";
		
		require_once ('wspp/auth.php');
		$lr = $this->client->login(LOGIN,PASSWORD);
		$this->sessid = $lr->client;
		$this->sesskey = $lr->sessionkey;
		
		//debug
		//$this->res = $lr;
		//$this->__debug(__METHOD__);
	}
	
	public function __destruct(){
		$this->res = $this->client->logout($this->sessid, $this->sesskey);
		
		//debug
		//$this->__debug(__METHOD__);
	}
	
	public function get_users(){
		$userids = array();
		$this->res = $this->client->get_users($this->sessid, $this->sesskey, $userids, "");
		
		//debug
		$this->__debug(__METHOD__);
		
		return $this->res;
	}
	
	public function get_user_byusername($username){
		$this->res = $this->client->get_user_byusername($this->sessid, $this->sesskey, $username);
		
		//debug
		$this->__debug(__METHOD__, $username);
		
		return $this->res[0];
	}
	
	public function get_user_byidnumber($idnumber){
		$this->res = $this->client->get_user_byidnumber($this->sessid, $this->sesskey, $idnumber);
		
		//debug
		$this->__debug(__METHOD__, $userid);
		
		return $this->res[0];
	}
	
	public function add_user($userdetail){		
		$user = new userDatum();
		$user->setFirstname($userdetail['nama_depan']);
		$user->setIdnumber($userdetail['idnumber']);
		$user->setLastname($userdetail['nama_belakang']);
		$user->setPasswordmd5($userdetail['password']);
		$user->setUsername($userdetail['username']);
		$user->setEmail($userdetail['email']);
		$user->setCity($userdetail['kota']);
		$user->setCountry("ID");
		
		$this->res = $this->client->add_user($this->sessid, $this->sesskey, $user);
		
		//debug
		$this->__debug(__METHOD__, $user);
		
		return $this->res[0];
	}
	
	public function update_user($userdetail){		
		$user = new userDatum();
		$user->setFirstname($userdetail['nama_depan']);
		$user->setIdnumber($userdetail['idnumber']);
		$user->setLastname($userdetail['nama_belakang']);
		$user->setPasswordmd5($userdetail['password']);
		$user->setUsername($userdetail['username']);
		$user->setEmail($userdetail['email']);
		$user->setCity($userdetail['kota']);
		$user->setCountry("ID");
		
		//idfield
		$idfield = "idnumber";
		
		$this->res = $this->client->update_user($this->sessid, $this->sesskey, $user, $idfield);
		
		//debug
		//$data['user'] = $user;
		//$data['idfield'] = $idfield;
		//$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function delete_user($idnumber){
		//useridfield
		$idfield = "idnumber";
		
		$this->res = $this->client->delete_user($this->sessid, $this->sesskey, $idnumber, $idfield);
		
		//debug
		//$data['idnumber'] = $idnumber;
		//$data['idfield'] = $idfield;
		//$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function get_categories(){
		$this->res = $this->client->get_categories($this->sessid, $this->sesskey, '', '');
		
		//debug
		$this->__debug(__METHOD__);
		
		return $this->res;
	}
	
	public function get_category_byid($id){
		$this->res = $this->client->get_category_byid($this->sessid, $this->sesskey, $id);
		
		//debug
		$data['id'] = $id;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function add_category($categorydetail){
		$cat = new categoryDatum();
		$cat->setId($categorydetail['cat_id']);
		$cat->setDescription($categorydetail['cat_desc']);
		$cat->setName($categorydetail['cat_name']);
		
		$this->res = $this->client->add_category($this->sessid, $this->sesskey, $cat);
		
		//debug
		$data['category'] = $cat;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function update_category($categorydetail){
		
		//!!!!!!!!!!!! error !!!!!!!!!!!!!!//
		
		$cat = new categoryDatum();
		$cat->setId($categorydetail['cat_id']);
		$cat->setDescription($categorydetail['cat_desc']);
		$cat->setName($categorydetail['cat_name']);
		
		$this->res = $this->client->edit_categories($this->sessid, $this->sesskey, $cat);
		
		//debug
		$data['category'] = $cat;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];	
	}
	
	public function get_topics(){ //topic disini = course di moodle ~> di dalem course ada banyak topic
		$this->res = $this->client->get_courses($this->sessid, $this->sesskey, '', '');
		
		//debug
		$this->__debug(__METHOD__);
		
		return $this->res;
	}
	
	public function get_topic_bysearch($keyword){
		$this->res = $this->client->get_courses_search($this->sessid, $this->sesskey, $keyword);
		
		//debug
		$data['keyword'] = $keyword;
		$this->__debug(__METHOD__, $data);
		
		return $this->res;
	}
	
	public function get_topic_byidnumber($idnumber){
		$this->res = $this->client->get_course_byidnumber($this->sessid, $this->sesskey, $idnumber);
		
		//debug
		$data['id'] = $id;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function add_topic($topicdetail){
		$topic = new courseDatum();
		$topic->setCategory($topicdetail['catid']);
		$topic->setFullname($topicdetail['fullname']);
		$topic->setShortname($topicdetail['shortname']);
		$topic->setIdnumber($topicdetail['idnumber']);
		$topic->setSummary($topicdetail['summary']);
		$topic->setLang('');
		
		$this->res = $this->client->add_course($this->sessid, $this->sesskey, $topic);
		
		//debug
		$data['topic'] = $topic;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function update_topic($topicdetail){
		$topic = new courseDatum();
		$topic->setCategory($topicdetail['catid']);
		$topic->setFullname($topicdetail['fullname']);
		$topic->setShortname($topicdetail['shortname']);
		$topic->setIdnumber($topicdetail['idnumber']);
		$topic->setSummary($topicdetail['summary']);
		$topic->setLang('');
		
		$idfield = "idnumber";
		
		$this->res = $this->client->update_course($this->sessid, $this->sesskey, $topic, $idfield);
		
		//debug
		$data['topic'] = $topic;
		$data['idfield'] = $idfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function delete_topic($idnumber){
		$idfield = "idnumber";
		
		$this->res = $this->client->delete_course($this->sessid, $this->sesskey, $idnumber, $idfield);
		
		//debug
		$data['idnumber'] = $idnumber;
		$data['idfield'] = $idfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res[0];
	}
	
	public function get_topic_grades($idnumber){
		$idfield = "idnumber";
		
		$this->res = $this->client->get_course_grades($this->sessid, $this->sesskey, $idnumber, $idfield);
		
		//debug
		$data['idnumber'] = $idnumber;
		$data['idfield'] = $idfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res;
	}
	
	public function add_teacher($topicid, $userid){
		$topicidfield = "idnumber";
		$useridfield = "idnumber";
		
		//add teacher to course
		$this->res = $this->client->add_teacher($this->sessid, $this->sesskey, $topicid, $topicidfield, $userid, $useridfield);
		
		//debug
		$data['topicid'] = $topicid;
		$data['topicidfield'] = $topicidfield;
		$data['userid'] = $userid;
		$data['useridfield'] = $useridfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res; //return 0 / 1
	}
	
	public function remove_teacher($topicid, $userid){
		$topicidfield = "idnumber";
		$useridfield = "idnumber";
		
		//remove teacher from course
		$this->res = $this->client->remove_teacher($this->sessid, $this->sesskey, $topicid, $topicidfield, $userid, $useridfield);
		
		//debug
		$data['topicid'] = $topicid;
		$data['topicidfield'] = $topicidfield;
		$data['userid'] = $userid;
		$data['useridfield'] = $useridfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res; //return 0 / 1
	}
	
	public function add_student($topicid, $userid){
		$topicidfield = "idnumber";
		$useridfield = "idnumber";
		$users = array($userid);
		
		//add student to course
		$this->res['add'] = $this->client->add_student($this->sessid, $this->sesskey, $topicid, $topicidfield, $userid, $useridfield);
		//enrol student to course
		$enrol = $this->client->enrol_students($this->sessid, $this->sesskey, $topicid, $topicidfield, $users, $useridfield);
		$this->res['enrol'] = $enrol[0];
		
		//debug
		$data['topicid'] = $topicid;
		$data['topicidfield'] = $topicidfield;
		$data['userid'] = $userid;
		$data['useridfield'] = $useridfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res; //return 0 / 1
	}
	
	public function remove_student($topicid, $userid){
		$topicidfield = "idnumber";
		$useridfield = "idnumber";
		$users = array($userid);
		
		//remove student from course
		$this->res['remove'] = $this->client->remove_student($this->sessid, $this->sesskey, $topicid, $topicidfield, $userid, $useridfield);
		//unenrol student from course
		$unenrol = $this->client->unenrol_students($this->sessid, $this->sesskey, $topicid, $topicidfield, $users, $useridfield);
		$this->res['unenrol'] = $unenrol[0];
		
		//debug
		$data['topicid'] = $topicid;
		$data['topicidfield'] = $topicidfield;
		$data['userid'] = $userid;
		$data['useridfield'] = $useridfield;
		$this->__debug(__METHOD__, $data);
		
		return $this->res; //return 0 / 1
	}
	
	private function __debug($method, $data = NULL){
		echo "<b>".$method." </b><br/><br/>";
		if($data != NULL){
			echo "<em>Data sent :</em><br/>";
			print_r($data);
			echo "<br/><br/>";
		}
		echo "<em>Result :</em><br/>";
		print_r($this->res);
		echo "<hr/>";
	}
}
