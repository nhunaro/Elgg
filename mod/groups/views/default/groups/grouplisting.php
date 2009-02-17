<?php
	/**
	 * Elgg user display (small)
	 * 
	 * @package ElggGroups
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity'] The user entity
	 */
	
	$icon = elgg_view(
			"groups/icon", array(
									'entity' => $vars['entity'],
									'size' => 'small',
								  )
		);
		
	//get the membership type
	$membership = $vars['entity']->membership;
	if($membership == 2)
		$mem = elgg_echo("groups:open");
	else
		$mem = elgg_echo("groups:closed");
		
	$info .= "<div style=\"float:right;\">" . $mem . " / " . elgg_echo("groups:member") . " (" . get_group_members($vars['entity']->guid, 10, 0, 0, true) . ")</div>";
	$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\">" . $vars['entity']->name . "</a></b></p>";
    $info .= "<p class=\"owner_timestamp\">" . $vars['entity']->description . "</p>";

	// num users, last activity, owner etc

	echo elgg_view_listing($icon, $info);
		
?>