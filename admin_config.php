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
		'main/list'			=> array('caption' => 'Manage Userdays', 'perm' => 'P'),
		'main/create'		=> array('caption' => 'Create Userdays', 'perm' => 'P'),
		'main/prefs' 		=> array('caption' => LAN_PREFS, 'perm' => 'P'),
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
	protected $table			= 'userdays';
	protected $pid				= 'id';
	protected $perPage			= 20;
	protected $batchDelete		= true;
	protected $listOrder		= 'id DESC';

	protected $fields = array(
		'checkboxes' =>   array (
			'title' => '',
			'type' => null,
			'data' => null,
			'width' => '5%',
			'thclass' => 'center',
			'forced' => '1',
			'class' => 'center',
			'toggle' => 'e-multiselect',
		),
		'id' =>   array (
			'title' => LAN_ID,
			'data' => 'int',
			'width' => '5%',
			'help' => '',
			'readParms' => '',
			'writeParms' => '',
			'class' => 'left',
			'thclass' => 'left',
		),
		'event_name' => array(
			'title' => 'Event Name',
			'type' => 'text',
			'data' => 'str',
			'width' => 'auto',
			'inline' => true,
			'help' => 'The name of the event.',
			'readParms' => '',
			'writeParms' => '',
			'class' => 'left',
			'thclass' => 'left',
		),
		'event_date' => array(
			'title' => 'Event Date',
			'type' => 'datestamp',
			'data' => 'str',
			'width' => 'auto',
			'inline' => true,
			'help' => '',
			'readParms' => '',
			'writeParms' => '',
			'class' => 'left',
			'thclass' => 'left',
		),
		'options' =>   array (
			'title' => LAN_OPTIONS,
			'type' => null,
			'data' => null,
			'width' => '10%',
			'thclass' => 'center last',
			'class' => 'center last',
			'forced' => '1',
		),
	);

	protected $fieldpref = array('event_name', 'event_date');

	protected $prefs = array(
		'enableUserdays' => array(
			'title' => 'Enable Userdays?',
			'tab' => 0,
			'type' => 'boolean',
			'data' => 'str',
			'help' => 'Do you want your custom events added to the holidays output?'
		),
	);

	public function init()
	{
	}

	public function beforeCreate($new_data)
	{
		return $new_data;
	}

	public function afterCreate($new_data, $old_data, $id)
	{
	}

	public function onCreateError($new_data, $old_data)
	{
	}

	public function beforeUpdate($new_data, $old_data, $id)
	{
		return $new_data;
	}

	public function afterUpdate($new_data, $old_data, $id)
	{
	}

	public function onUpdateError($new_data, $old_data, $id)
	{
	}
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
