<?php
/*
 * Date+ - An advanced date display menu for e107
 *
 * Copyright (C) 2010-2015 Patrick Weaver (http://trickmod.com/)
 * For additional information refer to the README.mkd file.
 *
 */
require_once('../../class2.php');
if (!getperms('P'))
{
	header('location:'.e_BASE.'index.php');
	exit;
}

class dateplus_adminArea extends e_admin_dispatcher
{
	protected $modes = array(
		'main'	=> array(
			'controller' 	=> 'dateplus_ui',
			'path' 			=> null,
			'ui' 			=> 'dateplus_form_ui',
			'uipath' 		=> null
		),
	);

	protected $adminMenu = array(
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),
		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'
	);

	protected $menuTitle = 'dateplus';
}

class dateplus_ui extends e_admin_ui
{
		protected $pluginTitle		= 'Date+';
		protected $pluginName		= 'dateplus';
	//	protected $eventName		= 'dateplus-'; // remove comment to enable event triggers in admin.
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10;
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable.

	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

		protected $listOrder		= ' DESC';
		protected $fields 		= NULL;
		protected $fieldpref = array();

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'enableUserdays'		=> array('title'=> 'EnableUserdays', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>'Help Text goes here'),
		);

		public function init()
		{
			// Set drop-down values (if any).
		}

		// ------- Customize Create --------
		public function beforeCreate($new_data)
		{
			return $new_data;
		}

		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something
		}

		// ------- Customize Update --------
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something
		}
		/*
		// optional - a custom page.
		public function customPage()
		{
			$text = 'Hello World!';
			return $text;

		}
		*/
}

class dateplus_form_ui extends e_admin_form_ui
{
}

new dateplus_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;
?>
