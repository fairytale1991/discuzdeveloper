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

class magic_namepost {

	var $version = '1.0';
	var $name = 'namepost_name';
	var $description = 'namepost_desc';
	var $price = '10';
	var $weight = '10';
	var $targetgroupperm = true;
	var $copyright = '<a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a>';
	var $magic = array();
	var $parameters = array();

	function getsetting(&$magic) {
		global $_G;
		$settings = array(
			'fids' => array(
				'title' => 'namepost_forum',
				'type' => 'mselect',
				'value' => array(),
			),
		);
		loadcache('forums');
		$settings['fids']['value'][] = array(0, '&nbsp;');
		if(empty($_G['cache']['forums'])) $_G['cache']['forums'] = array();
		foreach($_G['cache']['forums'] as $fid => $forum) {
			$settings['fids']['value'][] = array($fid, ($forum['type'] == 'forum' ? str_repeat('&nbsp;', 4) : ($forum['type'] == 'sub' ? str_repeat('&nbsp;', 8) : '')).$forum['name']);
		}
		$magic['fids'] = explode("\t", $magic['forum']);

		return $settings;
	}

	function setsetting(&$magicnew, &$parameters) {
		global $_G;
		$magicnew['forum'] = is_array($parameters['fids']) && !empty($parameters['fids']) ? implode("\t",$parameters['fids']) : '';
	}

	function usesubmit() {
		global $_G;
		$id = intval($_G['gp_id']);
		if(empty($id)) {
			showmessage(lang('magic/namepost', 'namepost_info_nonexistence'));
		}
		$idtype = !empty($_G['gp_idtype']) ? htmlspecialchars($_G['gp_idtype']) : '';
		if(!in_array($idtype, array('pid', 'cid'))) {
			showmessage(lang('magic/namepost', 'namepost_use_error'));
		}
		if($idtype == 'pid') {
			$_G['tid'] = intval($_G['gp_ptid']);
			$post = getpostinfo($id, 'pid', array('p.first', 'p.tid', 'p.fid', 'p.authorid', 'p.dateline', 'p.anonymous'));
			$this->_check($post);
			$authorid = $post['authorid'];
			$author = $post['anonymous'] ? '' : 1;
		} elseif($idtype == 'cid') {
			$comment = DB::fetch_first("SELECT * FROM ".DB::table('home_comment')." WHERE cid='$id'");
			$authorid = $comment['authorid'];
			$author = $comment['author'];
		}
		if($author) {
			showmessage('magicuse_bad_object');
		}
		$member = DB::fetch_first("SELECT username, groupid FROM ".DB::table('common_member')." WHERE uid='$authorid'");
		if(!checkmagicperm($this->parameters['targetgroups'], $member['groupid'])) {
			showmessage(lang('magic/namepost', 'namepost_info_user_noperm'));
		}
		$author = daddslashes($member['username']);

		usemagic($this->magic['magicid'], $this->magic['num']);
		updatemagiclog($this->magic['magicid'], '2', '1', '0', 0, $idtype, $id);
		showmessage(lang('magic/namepost', 'magic_namepost_succeed'),'javascript:;', array('uid' => $authorid, 'username' => $author, 'avatar' => 1));
	}

	function show() {
		global $_G;
		$id = !empty($_G['gp_id']) ? htmlspecialchars($_G['gp_id']) : '';
		$idtype = !empty($_G['gp_idtype']) ? htmlspecialchars($_G['gp_idtype']) : '';
		if($idtype == 'pid') {
			list($id, $_G['tid']) = explode(':', $id);
			if($id && $_G['tid']) {
				$post = getpostinfo($id, 'pid', array('p.fid', 'p.authorid'));
				$this->_check($post);
			}
		}

		magicshowtype('top');
		magicshowtips(lang('magic/namepost', 'namepost_desc'));
		magicshowtips(lang('magic/namepost', 'namepost_num', array('magicnum' => $this->magic['num'])));
		magicshowsetting('', 'id', $id, 'hidden');
		magicshowsetting('', 'idtype', $idtype, 'hidden');
		if($idtype == 'pid') {
			magicshowsetting('', 'ptid', $_G['tid'], 'hidden');
		}
		magicshowtype('bottom');
	}

	function buy() {
		global $_G;
		$id = !empty($_G['gp_id']) ? htmlspecialchars($_G['gp_id']) : '';
		$idtype = !empty($_G['gp_idtype']) ? htmlspecialchars($_G['gp_idtype']) : '';
		if(!empty($id) && $_G['gp_idtype'] == 'pid') {
			list($id, $_G['tid']) = explode(':', $id);
			$post = getpostinfo(intval($id), 'pid', array('p.fid', 'p.authorid'));
			$this->_check($post);
		}
	}

	function _check($post) {
		global $_G;
		if(!checkmagicperm($this->parameters['forum'], $post['fid'])) {
			showmessage(lang('magic/namepost', 'namepost_info_noperm'));
		}
		$member = getuserbyuid($post['authorid']);
		if(!checkmagicperm($this->parameters['targetgroups'], $member['groupid'])) {
			showmessage(lang('magic/namepost', 'namepost_info_user_noperm'));
		}
	}

}

?>