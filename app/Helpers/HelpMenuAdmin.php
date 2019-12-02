<?php

	namespace App\Helpers;

	/**
	* HelpMenuAdmin
	*/
	class HelpMenuAdmin
	{
		public static function SideMenu()
		{
			$action = \Request::route()->action['as'] ?? '';

			return [
				[
					'permission'=>'#',
					'name_menu'=>'',
				],
				[
					'permission'=>'	',
					'label'=>'Página inicial',
					'url'=>'adm.index',
					'icon'=>'fa fa-home',
					'line'=>true,
					'active'=>(in_array($action, ['adm.index'])) ? 'active' : '',
				],

				[
					'permission'=>'adm.menu_developer',
					'name_menu'=>'Desenvolvedor',
				],

				[
					'permission'=>'adm.menu_users',
					'label'=>'Usuários',
					'url'=>'#',
					'link_btn'=>'user_id',
					'icon'=>'fa fa-users',
					
					'active'=>(in_array($action, [
						'adm.users.list',
						'adm.users.new',
						'adm.users.edit',
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'adm.users.list',
							'active_page'=>(in_array($action, ['adm.users.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novo usuário',
							'url'=>'adm.users.new',
							'active_page'=>(in_array($action, ['adm.users.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
				[
					'permission'=>'adm.menu_groups',
					'label'=>'Grupo',
					'url'=>'#',
					'link_btn'=>'group_id',
					'icon'=>'fa fa-th-large',
					
					'active'=>(in_array($action, [
						'adm.groups.list',
						'adm.groups.new',
						'adm.groups.edit',
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'adm.groups.list',
							'active_page'=>(in_array($action, ['adm.groups.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novo grupo',
							'url'=>'adm.groups.new',
							'active_page'=>(in_array($action, ['adm.groups.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
				[
					'permission'=>'adm.menu_created_permissions',
					'label'=>'Permissões',
					'url'=>'#',
					'link_btn'=>'permi_id',
					'icon'=>'fa fa-list',
					
					'active'=>(in_array($action, [
						'adm.created_permissions.list',
						'adm.created_permissions.new',
						'adm.created_permissions.edit',
					])) ? 'active' : '',
					
					'sub_menu'=>[
						[
							'label'=>'Lista',
							'url'=>'adm.created_permissions.list',
							'active_page'=>(in_array($action, ['adm.created_permissions.list'])) ? 'active-page' : '',
						],
						[
							'label'=>'Novas permissões',
							'url'=>'adm.created_permissions.new',
							'active_page'=>(in_array($action, ['adm.created_permissions.new'])) ? 'active-page' : '',
						],
					],
					'line'=>true,
				],
			];
		}
	}