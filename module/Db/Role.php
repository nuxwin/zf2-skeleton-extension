<?php

use Base\Role as BaseRole;

/**
 * Skeleton subclass for representing a row from the 'roles' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Role extends BaseRole
{
	public static function getRoleSelectOptions()
	{
		$options = [];
		$roles = RoleQuery::create()->orderByName('ASC')->find();
	
		foreach($roles as $role)
		{
			$options[$role->getPrimaryKey()] = $role->getName();
		}
	
		return $options;
	}
}