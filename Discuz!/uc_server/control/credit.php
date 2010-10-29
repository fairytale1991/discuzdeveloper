<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id$
*/

!defined('IN_UC') && exit('Access Denied');

class creditcontrol extends base {

	function __construct() {
		$this->creditcontrol();
	}

	function creditcontrol() {
		parent::__construct();
		$this->init_input();
		$this->load('note');
		$this->load('misc');
	}

	function onrequest() {
		$uid = intval($this->input('uid'));
		$from = intval($this->input('from'));
		$to = intval($this->input('to'));
		$toappid = intval($this->input('toappid'));
		$amount = intval($this->input('amount'));
		$status = 0;
		if(isset($this->settings['creditexchange'][$this->app['appid'].'_'.$from.'_'.$toappid.'_'.$to])) {
			$toapp = $app = $this->cache['apps'][$toappid];
			$apifilename = isset($toapp['apifilename']) && $toapp['apifilename'] ? $toapp['apifilename'] : 'uc.php';
			if($toapp['extra']['apppath'] && @include $toapp['extra']['apppath'].'./api/'.$apifilename) {
				$uc_note = new uc_note();
				$status = $uc_note->updatecredit(array('uid' => $uid, 'credit' => $to, 'amount' => $amount), '');
			} else {
				$url = $_ENV['note']->get_url_code('updatecredit', "uid=$uid&credit=$to&amount=$amount", $toappid);
				$status = trim($_ENV['misc']->dfopen($url, 0, '', '', 1, $toapp['ip'], UC_NOTE_TIMEOUT));
			}
		}
		echo $status ? 1 : 0;
		exit;
	}
}

?>