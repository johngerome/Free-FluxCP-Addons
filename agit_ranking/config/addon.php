<?php
/**
 *
 * Agit Ranking Addon Configuration
 *
 * @package		GTheme
 * @author		John Gerome "Gerome" Baldonado
 * @copyright	Copyright (c) 2013, jiidesignstudio.com
 * 
 * Please do not redistribute my work without
 * permission and leave all credits in tact. 
 */
 
return array(
	'AgitRankingLimit'  => 20,                     		     // Maximum No. of Guilds to display

    'AgitRankingHideGroupLevel'  => AccountLevel::LOWGM,     // Hide Guild who's Guild Master is equal or greater than AccountLevel::LOWGM (group_id >= 2)

	'SubMenuItems' => array(
		'ranking' => array(
			'agit'      => 'Agit Ranking'
		),
	)
)
?>