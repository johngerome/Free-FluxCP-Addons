<?php 
/**
 *
 * DOTA Pvp Ranking view section
 *
 * @package		GTheme
 * @author		John Gerome "Gerome" Baldonado
 * @copyright	Copyright (c) 2013, jiidesignstudio.com
 * 
 * Please do not redistribute my work without
 * permission and leave all credits in tact.
 */

if (!defined('FLUX_ROOT')) exit; ?>

<h2><?php echo Flux::message('PvPRankinglabel') ?></h2>
<h3>
	Top <?php echo number_format($limit=(int)Flux::config('PvpRankingLimit')) ?> Murderer
	<?php if (!is_null($jobClass)): ?>
	(<?php echo htmlspecialchars($className=$this->jobClassText($jobClass)) ?>)
	<?php endif ?>
	on <?php echo htmlspecialchars($server->serverName) ?>

</h3>
<?php if ($chars): ?>
<form action="" method="get" class="search-form2">
	<?php echo $this->moduleActionFormInputs('ranking', 'pvpranking') ?>
	<p>
		<label for="jobclass">Filter by job class:</label>
		<select name="jobclass" id="jobclass">
			<option value=""<?php if (is_null($jobClass)) echo 'selected="selected"' ?>>All</option>
		<?php foreach ($classes as $jobClassIndex => $jobClassName): ?>
			<option value="<?php echo $jobClassIndex ?>"
				<?php if (!is_null($jobClass) && $jobClass == $jobClassIndex) echo ' selected="selected"' ?>>
				<?php echo htmlspecialchars($jobClassName) ?>
			</option>
		<?php endforeach ?>
		</select>
		
		<input type="submit" value="Filter" />
		<input type="button" value="Reset" onclick="reload()" />
	</p>
</form>
<table class="horizontal-table">
	<tr>
		<th><?php echo htmlspecialchars(Flux::message('RankLabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('CharacterNameLabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('JobClassLabel')) ?></th>
		<th colspan="2"><?php echo htmlspecialchars(Flux::message('GuildNameLabel')) ?></th>
        <th><?php echo htmlspecialchars(Flux::message('KillLabel')) ?></th>
        <th><?php echo htmlspecialchars(Flux::message('Deathlabel')) ?></th>
		<th><?php echo htmlspecialchars(Flux::message('StreakLabel')) ?></th>
	</tr>
	<?php $topRankType = !is_null($jobClass) ? $className : 'character' ?>
	<?php for ($i = 0; $i < $limit; ++$i): ?>
	<tr<?php if (!isset($chars[$i])) echo ' class="empty-row"'; if ($i === 0) echo ' class="top-ranked" title="<strong>'.htmlspecialchars($chars[$i]->char_name).'</strong> '.htmlspecialchars(Flux::message('TopRankedLabel')).' '.$topRankType.'!"' ?>>
		<td align="right"><?php echo number_format($i + 1) ?></td>
		<?php if (isset($chars[$i])): ?>
		<td><strong>
			<?php if ($auth->actionAllowed('character', 'view') && $auth->allowedToViewCharacter): ?>
				<?php echo $this->linkToCharacter($chars[$i]->char_id, $chars[$i]->char_name) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($chars[$i]->char_name) ?>
			<?php endif ?>
		</strong></td>
		<td><?php echo $this->jobClassText($chars[$i]->char_class) ?></td>
		<?php if ($chars[$i]->guild_name): ?>
		<?php if ($chars[$i]->guild_emblem_len): ?>
		<td width="24"><img src="<?php echo $this->emblem($chars[$i]->guild_id) ?>" /></td>
		<?php endif ?>
		<td<?php if (!$chars[$i]->guild_emblem_len) echo ' colspan="2"' ?>>
			<?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
				<?php echo $this->linkToGuild($chars[$i]->guild_id, $chars[$i]->guild_name) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($chars[$i]->guild_name) ?>
			<?php endif ?>
		</td>
		<?php else: ?>
		<td colspan="2"><span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span></td>
		<?php endif ?>
		<td><?php echo number_format($chars[$i]->kills) ?></td>
		<td><?php echo number_format($chars[$i]->deaths) ?></td>
		<td><?php echo number_format($chars[$i]->streaks) ?></td>
		<?php else: ?>
		<td colspan="8"></td>
		<?php endif ?>
	</tr>
	<?php endfor ?>
</table>
<?php else: ?>
<p>There are no characters. <a href="javascript:history.go(-1)"><th><?php echo htmlspecialchars(Flux::message('GoBackLabel')) ?></th></a>.</p>
<?php endif ?>