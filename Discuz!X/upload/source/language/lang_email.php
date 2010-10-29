<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id$
 */


$lang = array
(
	'hello' => '你好',
	'moderate_member_invalidate' => '否决',
	'moderate_member_delete' => '删除',
	'moderate_member_validate' => '通过',


	'get_passwd_subject' =>		'取回密码说明',
	'get_passwd_message' =>		'
<p>{username}，
这封信是由 {bbname} 发送的。</p>

<p>你收到这封邮件，是因为在我们的论坛上这个邮箱地址被登记为用户邮箱，
且该用户请求使用 Email 密码重置功能所致。</p>
<p>
----------------------------------------------------------------------<br />
<strong>重要！</strong><br />
----------------------------------------------------------------------</p>

<p>如果你没有提交密码重置的请求或不是我们论坛的注册用户，请立即忽略
并删除这封邮件。只在你确认需要重置密码的情况下，才继续阅读下面的
内容。</p>
<p>
----------------------------------------------------------------------<br />
<strong>密码重置说明</strong><br />
----------------------------------------------------------------------</p>
</p>
你只需在提交请求后的三天之内，通过点击下面的链接重置你的密码：<br />

<a href="{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}" target="_blank">{siteurl}member.php?mod=getpasswd&amp;uid={uid}&amp;id={idstring}</a>
<br />
(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)</p>

<p>上面的页面打开后，输入新的密码后提交，之后你即可使用新的密码登录论坛了。你可以在用户控制面板中随时修改你的密码。</p>

<p>本请求提交者的 IP 为 {clientip}</p>


<p>
此致<br />
</p>
<p>{bbname} 管理团队.
{siteurl}</p>',


	'email_verify_subject' =>	'Email 地址验证',
	'email_verify_message' =>	'
<p>{username}，
这封信是由 {bbname}发送的。</p>

<p>你收到这封邮件，是因为在我们论坛的新用户注册，或用户修改 Email 使用
了你的地址。如果你并没有访问过我们的论坛，或没有进行上述操作，请忽
略这封邮件。你不需要退订或进行其他进一步的操作。</p>
<br />
----------------------------------------------------------------------<br />
<strong>帐号激活说明</strong><br />
----------------------------------------------------------------------<br />

<p>你是我们论坛的新用户，或在修改你的注册 Email 时使用了本地址，我们需
要对你的地址有效性进行验证以避免垃圾邮件或地址被滥用。</p>

<p>你只需点击下面的链接即可激活你的帐号：<br />

<a href="{url}" target="_blank">{url}</a>
<br />
(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)</p>

<p>感谢你的访问，祝你使用愉快！</p>


<p>
此致<br />

{bbname} 管理团队.<br />
{siteurl}</p>',

	'add_member_subject' =>		'你被添加成为会员',
	'add_member_message' => 	'
{newusername} ，
这封信是由 {bbname} 发送的。

我是 {adminusername} ，{bbname} 的管理者之一。你收到这封邮件，是因为你
刚刚被添加成为我们论坛的会员，当前 Email 即是我们为你注册的地址。

----------------------------------------------------------------------
重要！
----------------------------------------------------------------------

如果你对我们的论坛不感兴趣或无意成为会员，请忽略这封邮件。

----------------------------------------------------------------------
帐号信息
----------------------------------------------------------------------

论坛名称：{bbname}
论坛地址：{siteurl}

用户名：{newusername}
密码：{newpassword}

从现在起你可以使用你的帐号登录我们的论坛，祝你使用愉快！



此致

{bbname} 管理团队.
{siteurl}',


	'birthday_subject' =>		'祝你生日快乐',
	'birthday_message' => 		'
{username}，
这封信是由 {bbname} 发送的。

你收到这封邮件，是因为在我们的论坛上这个邮箱地址被登记为用户邮箱，
并且按照你填写的信息，今天是你的生日，很高兴能在此时为你献上一份
生日祝福，我谨代表{bbname}管理团队，衷心祝福你生日快乐。

如果你并非我们的会员，或今天并非你的生日，可能是有人误用了你的邮
件地址，或错误的填写了生日信息，本邮件不会多次重复发送，请忽略这
封邮件。



此致

{bbname} 管理团队.
{siteurl}',

	'email_to_friend_subject' =>	'{$_G[member][username]} 推荐给你: $thread[subject]',
	'email_to_friend_message' =>	'
这封信是由 {$_G[setting][bbname]} 的 {$_G[member][username]} 发送的。

你收到这封邮件，是因为在 {$_G[member][username]} 通过 {$_G[setting][bbname]} 的“推荐给朋友”
功能推荐了如下的内容给你，如果你对此不感兴趣，请忽略这封邮件。你不
需要退订或进行其他进一步的操作。

----------------------------------------------------------------------
信件原文开始
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
信件原文结束
----------------------------------------------------------------------

请注意这封信仅仅是由用户使用 “推荐给朋友”发送的，不是论坛官方邮件，
论坛管理团队不会对这类邮件负责。

欢迎你访问 {$_G[setting][bbname]}
$_G[siteurl]',

	'email_to_invite_subject' =>	'你的朋友 {$_G[member][username]} 发送 {$_G[setting][bbname]} 论坛注册邀请码给你',
	'email_to_invite_message' =>	'
$sendtoname,
这封信是由 {$_G[setting][bbname]} 的 {$_G[member][username]} 发送的。

你收到这封邮件，是因为在 {$_G[member][username]} 通过我们论坛的“发送邀请码给朋友”
功能推荐了如下的内容给你，如果你对此不感兴趣，请忽略这封邮件。你不
需要退订或进行其他进一步的操作。

----------------------------------------------------------------------
信件原文开始
----------------------------------------------------------------------

$message

----------------------------------------------------------------------
信件原文结束
----------------------------------------------------------------------

请注意这封信仅仅是由用户使用 “发送邀请码给朋友”发送的，不是论坛官方邮件，
论坛管理团队不会对这类邮件负责。

欢迎你访问 {$_G[setting][bbname]}
$_G[siteurl]',


	'moderate_member_subject' =>	'用户审核结果通知',
	'moderate_member_message' =>	'
<p>{username} ，
这封信是由 {bbname} 发送的。</p>

<p>你收到这封邮件，是因为在我们的论坛上这个邮箱地址被新用户注册时所
使用，且管理员设置了需对新用户进行人工审核，本邮件将通知你提交的
申请的审核结果。</p>

----------------------------------------------------------------------<br />
<strong>注册信息与审核结果</strong><br />
----------------------------------------------------------------------<br />

用户名: {username}<br />
注册时间: {regdate}<br />
提交时间: {submitdate}<br />
提交次数: {submittimes}<br />
注册原因: {message}<br />
<br />
审核结果: {modresult}<br />
审核时间: {moddate}<br />
审核管理员: {adminusername}<br />
管理员留言: {remark}<br />
<br />
----------------------------------------------------------------------<br />
<strong>审核结果说明</strong><br />
----------------------------------------------------------------------<br />

<p>通过: 你的注册已通过审核，你已成为我们论坛的正式用户。</p>

<p>否决: 你的注册信息不完整，或未满足我们对新用户的某些要求，你可以
	  根据管理员留言，<a href="home.php?mod=spacecp&ac=profile" target="_blank">完善你的注册信息</a>，然后再提交。</p>

<p>删除：你的注册由于与我们的要求偏差较大，或我们的论坛新注册人数已
	  超过预期，申请被彻底否决。你的帐号已从数据库中删除，将无法
	  再使用其登录或提交再次审核，请你谅解。</p>

<br />
<br />
此致<br />
<br />
{bbname} 管理团队.<br />
{siteurl}',
);

?>