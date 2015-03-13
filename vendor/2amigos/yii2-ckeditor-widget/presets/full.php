<?php
/**
 *
 * full preset returns the full toolbar configuration set for CKEditor.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
return [
	'height' => 400,
	'toolbarGroups' => [
		['name' => 'clipboard', 'groups' => ['mode','undo', 'selection', 'clipboard', 'doctools']],
		['name' => 'links', 'groups' => ['links', 'insert']],
		['name' => 'others'],
		['name' => 'editing', 'groups' => ['find', 'spellchecker', 'tools', 'about']],
		'/',
		['name' => 'paragraph', 'groups' => ['templates', 'list', 'indent', 'align']],
		['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors','cleanup']],
		['name' => 'forms'],
		['name' => 'styles'],
		['name' => 'blocks'],
		'/',
		
	],
];