<?php
/**
 *
 * DOTA PvP Ranking Module section
 *
 * @package		GTheme
 * @author		John Gerome "Gerome" Baldonado
 * @copyright	Copyright (c) 2013, jiidesignstudio.com
 * 
 * Please do not redistribute my work without
 * permission and leave all credits in tact.
 */
 
return array(

    'PvpRankingLimit'    => 20,                            //
    'PvPRankingHideGroupLevel'  => AccountLevel::LOWGM,    //
    
    'PvpCharRankingThreshold'  => 0,                       // Number of days the character must have logged in within to be listed in character ranking. (0 = disabled)
    'PvpHideTempBannedCharRank'  => false,                 // Hide temporarily banned characters from ranking.
    'PvpHidePermBannedCharRank'  => true,                  // Hide permanently banned characters from ranking.'HidePermBannedCharRank'    =>
 
	'SubMenuItems' => array(
        'ranking' => array(
    			'pvpranking'     => 'PvP Ranking'
    		),
    ),
    
	// Don't touch this.
    'FluxTables' => array(
        'pvpladder' => 'pvpladder',
    )
)
?>