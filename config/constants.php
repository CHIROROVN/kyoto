<?php
//file : app/config/constants.php

return [
	'DEFINE' => array(
		'INSERT' 				=> 0,
		'UPDATE' 				=> 1,
		'DELETE' 				=> 9,

		'PAGINATION' 			=> 3, // number item in per page backend
		'MESSAGE_NO_ACCESS'		=> 'You do not have access!', // message when permission user login access

		//popup message are you delete?
		'TITLE_DELETE'			=> 'Delete',
		'CONTENT_DELETE' 		=> 'Are you want to delete?',
	),
];

include('function.php');