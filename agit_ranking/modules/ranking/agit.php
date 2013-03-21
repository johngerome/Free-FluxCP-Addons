<?php
/**
 *
 * Agit Ranking Module section
 *
 * @package		GTheme
 * @author		John Gerome "Gerome" Baldonado
 * @copyright	Copyright (c) 2013, jiidesignstudio.com
 * 
 * Please do not redistribute my work without
 * permission and leave all credits in tact.
 */
 
if (!defined('FLUX_ROOT')) exit;

$title = 'Guild Ranking';

$col  = "g.guild_id, g.name, g.guild_lv, g.emblem_len, g.agit_points ";

$sql  = "SELECT $col FROM {$server->charMapDatabase}.guild AS g ";
$sql .= "LEFT JOIN {$server->charMapDatabase}.`char` AS ch ON ch.char_id = g.char_id ";
$sql .= "LEFT JOIN {$server->loginDatabase}.login ON login.account_id = ch.account_id ";

$groups = AccountLevel::getGroupID((int)Flux::config('AgitRankingHideGroupLevel'), '<');
if(!empty($groups)) {
	$ids   = implode(', ', array_fill(0, count($groups), '?'));
	$sql  .= "WHERE login.group_id IN ($ids) ";
	$bind  = array_merge($groups);
}

$sql .= "ORDER BY g.agit_points DESC, g.guild_lv DESC ";
$sql .= "LIMIT ".(int)Flux::config('AgitRankingLimit');
$sth  = $server->connection->getStatement($sql);

$sth->execute($bind);
$guilds = $sth->fetchAll();
?>