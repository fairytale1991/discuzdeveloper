<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id$
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class magic_thunder {

	var $version = '1.0';
	var $name = 'thunder_name';
	var $description = 'thunder_desc';
	var $price = '20';
	var $weight = '20';
	var $useevent = 0;
	var $targetgroupperm = false;
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $magic = array();
	var $parameters = array();

	function getsetting(&$magic) {}

	function setsetting(&$magicnew, &$parameters) {}

	function usesubmit() {
		global $_G;

		$uid = $_G['uid'];
		$_G['uid'] = 0;
		$avatar = avatar($uid, 'middle',true);
		include_once libfile('function/feed');
		feed_add(
			'thunder', 'magicuse_thunder_announce_title',
				array(
					'uid' => $uid,
					'username' => "<a href=\"home.php?mod=space&uid=$uid\">$_G[username]</a>"),
				'magicuse_thunder_announce_body',
				array(
					'uid' => $uid,
					'magic_thunder' =>1), '', array($avatar), array("home.php?mod=space&uid=$uid")
		);
		$_G['uid'] = $uid;
		usemagic($this->magic['magicid'], $this->magic['num']);
		updatemagiclog($this->magic['magicid'], '2', '1', '0', '0', 'uid', $_G['uid']);
		showmessage('magics_thunder_message', '', array('magicname'=>$_G['setting']['magics']['thunder']), array('showdialog' => 1));
	}

	function show() {
		magicshowtips(lang('magic/thunder', 'thunder_info'));
	}

}

?>