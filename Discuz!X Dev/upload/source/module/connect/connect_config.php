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

if(empty($_G['uid'])) {
	showmessage('to_login', '', array(), array('showmsg' => true, 'login' => 1));
}

$op = !empty($_G['gp_op']) ? $_G['gp_op'] : '';
$referer = dreferer();

if(submitcheck('connectsubmit')) {

	if($op == 'config') {

		$ispublishfeed = !empty($_G['gp_ispublishfeed']) ? 1 : 0;
		$ispublisht = !empty($_G['gp_ispublisht']) ? 1 : 0;
		DB::query("UPDATE ".DB::table('common_member_connect')." SET conispublishfeed='$ispublishfeed', conispublisht='$ispublisht' WHERE uid='$_G[uid]'");
		showmessage('connect_config_success', $referer);

	} elseif($op == 'unbind') {

		require_once libfile('function/connect');
		connect_merge_member();

		$connect_member = DB::fetch_first("SELECT * FROM ".DB::table('common_member_connect')." WHERE uid='$_G[uid]'");
		if ($connect_member['conuinsecret']) {

			if(!$_G['cookie']['client_token']) {
				showmessage('connect_config_unbind_failed', $referer);
			}

			if($_G['member']['conisregister']) {
				if($_G['gp_newpassword1'] !== $_G['gp_newpassword2']) {
					showmessage('profile_passwd_notmatch', $referer);
				}
				if(!$_G['gp_newpassword1'] || $_G['gp_newpassword1'] != addslashes($_G['gp_newpassword1'])) {
					showmessage('profile_passwd_illegal', $referer);
				}
			}

			$response = connect_user_unbind();
			if (!isset($response['status']) || $response['status'] !== 0) {
				showmessage('connect_config_unbind_busy', $referer);
			}

		} else {

			if($_G['member']['conisregister']) {
				if($_G['gp_newpassword1'] !== $_G['gp_newpassword2']) {
					showmessage('profile_passwd_notmatch', $referer);
				}
				if(!$_G['gp_newpassword1'] || $_G['gp_newpassword1'] != addslashes($_G['gp_newpassword1'])) {
					showmessage('profile_passwd_illegal', $referer);
				}
			}
		}

		DB::query("UPDATE ".DB::table('common_member_connect')." SET conuin='', conuinsecret='', conopenid='', conisfeed='0', conispublishfeed='0', conispublisht='0', conisregister='0', conisqzoneavatar='0' WHERE uid='$_G[uid]'");
		DB::query("UPDATE ".DB::table('common_member')." SET conisbind='0' WHERE uid='$_G[uid]'");
		DB::query("INSERT INTO ".DB::table('connect_memberbindlog')." (uid, uin, type, dateline) VALUES ('$_G[uid]', '{$_G[member][conuin]}', '2', '$_G[timestamp]')");

		if($_G['member']['conisregister']) {
			loaducenter();
			uc_user_edit($_G['member']['username'], null, $_G['gp_newpassword1'], null, 1);
		}

		foreach($_G['cookie'] as $k => $v) {
			dsetcookie($k);
		}

		$_G['uid'] = $_G['adminid'] = 0;
		$_G['username'] = $_G['member']['password'] = '';

		showmessage('connect_config_unbind_success', 'member.php?mod=logging&action=login');
	}
} else {
	dheader('location: home.php?mod=spacecp&ac=plugin&id=qqconnect:spacecp');
}
?>