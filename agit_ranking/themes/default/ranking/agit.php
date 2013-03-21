<?php

/**
 *
 * Agit Ranking View section
 *
 * @package		GTheme
 * @author		John Gerome "Gerome" Baldonado
 * @copyright	Copyright (c) 2013, jiidesignstudio.com
 * 
 * Please do not redistribute my work without
 * permission and leave all credits in tact.
 */

 if (!defined('FLUX_ROOT')) exit; ?>
<h2><?php echo htmlspecialchars(Flux::message('AgitRankingLabel')) ?></h2>
<h3>
    <?php echo htmlspecialchars(sprintf(Flux::message('TopGuildOnLabel'),number_format($limit=(int)Flux::config('AgitRankingLimit')),$server->serverName)) ?>
</h3>
<?php if ($guilds): ?>
	<table class="horizontal-table">
		<tr>
			<th><?php echo htmlspecialchars(Flux::message('RankLabel')) ?></th>
			<th colspan="2"><?php echo htmlspecialchars(Flux::message('GuildNameLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('GuildLevelLabel')) ?></th>
			<th><?php echo htmlspecialchars(Flux::message('GuildPointsLabel')) ?></th>
		</tr>
		<?php for ($i = 0; $i < $limit; ++$i): ?>
		<tr<?php if (!isset($guilds[$i])) echo ' class="empty-row"'; if ($i === 0) echo ' class="top-ranked" title="<strong>'.htmlspecialchars($guilds[$i]->name).'</strong> '.htmlspecialchars(Flux::message('TopRankGuildLabel')).'"' ?>>
			<td align="right"><?php echo number_format($i + 1) ?></td>
			<?php if (isset($guilds[$i])): ?>
			<?php if ($guilds[$i]->emblem_len): ?>
			<td width="24"><img src="<?php echo $this->emblem($guilds[$i]->guild_id) ?>" /></td>
			<?php endif ?>
			<td<?php if (!$guilds[$i]->emblem_len) echo ' colspan="2"' ?>>
                <strong>
    				<?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
    					<?php echo $this->linkToGuild($guilds[$i]->guild_id, $guilds[$i]->name) ?>
    				<?php else: ?>
    					<?php echo htmlspecialchars($guilds[$i]->name) ?>
    				<?php endif ?>
    			</strong>
            </td>
			<td><?php echo number_format($guilds[$i]->guild_lv) ?></td>
			<td><?php echo number_format($guilds[$i]->agit_points) ?></td>
			<?php else: ?>
			<td colspan="8"></td>
			<?php endif ?>
		</tr>
		<?php endfor ?>
	</table>
<?php else: ?>
<p>No guilds found. <a href="javascript:history.go(-1)"><?php echo htmlspecialchars(FLux::message('GoBackLabel')) ?></a>.</p>
<?php endif ?>