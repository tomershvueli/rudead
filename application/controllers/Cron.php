<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{	
		$this->load->model("User", "user");
		$users = $this->user->get_all_users();
		
		foreach($users as $user) {
			$last_checked = new DateTime($user->last_checked, new DateTimeZone("Europe/Paris"));
			$check_days = new DateInterval("P7D");
			$send_after_days = new DateInterval("P7D");
			if($last_checked->add($check_days)->add($send_after_days) < new DateTime()) {
				echo $user->email." is dead. RIP.";
			} elseif ($last_checked->add($check_days) < new DateTime()) {
				echo $user->email." has not given sign of life. Sending check mail";
			}
		}
	}
}