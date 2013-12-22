<?php
//Restricted Groups Mod

if(file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
   require_once(dirname(__FILE__) . '/SSI.php');
else if(!defined('SMF'))
   die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php and SSI.php files.');

if((SMF == 'SSI') && !$user_info['is_admin'])
   die('Admin priveleges required.');

db_extend('packages');

$result = $smcFunc['db_query']('', "SHOW COLUMNS FROM {db_prefix}boards LIKE 'restricted_groups'");

if ($smcFunc['db_fetch_assoc']($result) == 0)
	$smcFunc['db_query']('',"
			ALTER TABLE {db_prefix}boards
				ADD `restricted_groups` varchar(255) NOT NULL DEFAULT '' AFTER `redirect`
		");

?>