<?php

	namespace App\Helpers;

	/**
	* HelpAdmin
	*/
	class HelpAdmin
	{
		public static function completName($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}	

			$completName = $user->first_name .' '. $user->last_name;
			return $completName;
		}

		public static function permissionsUser($user = null)
		{
			if ($user == null) {
				$user = \Auth::user();
			}

	        $permissions_user = $user->Group->Permission;

	        $data = [];
	        foreach ($permissions_user as $permission_user) {
	            array_push($data, $permission_user->CreatedPermission->route);   
	        }
	        
	        return $data;
		}
	}