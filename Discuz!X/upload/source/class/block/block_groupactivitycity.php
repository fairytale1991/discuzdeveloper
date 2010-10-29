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
require_once libfile('block/groupactivity', 'class');
class block_groupactivitycity extends block_groupactivity {
	function block_groupactivitycity() {
		$this->setting = array(
			'gtids' => array(
				'title' => 'groupactivity_gtids',
				'type' => 'mselect',
				'value' => array(
				),
			),
			'place' => array(
				'title' => 'groupactivity_place',
				'type' => 'text'
			),
			'class' => array(
				'title' => 'groupactivity_class',
				'type' => 'select',
				'value' => array()
			),
			'orderby' => array(
				'title' => 'groupactivity_orderby',
				'type'=> 'mradio',
				'value' => array(
					array('dateline', 'groupactivity_orderby_dateline'),
					array('weekstart', 'groupactivity_orderby_weekstart'),
					array('monthstart', 'groupactivity_orderby_monthstart'),
					array('weekexp', 'groupactivity_orderby_weekexp'),
					array('monthexp', 'groupactivity_orderby_monthexp'),
				),
				'default' => 'dateline'
			),
			'titlelength' => array(
				'title' => 'groupactivity_titlelength',
				'type' => 'text',
				'default' => 40
			),
			'summarylength' => array(
				'title' => 'groupactivity_summarylength',
				'type' => 'text',
				'default' => 80
			),
			'startrow' => array(
				'title' => 'groupactivity_startrow',
				'type' => 'text',
				'default' => 0
			),
		);
	}
}

?>