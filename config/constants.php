<?php
//file : app/config/constants.php

return [
	'DEFINE' => array(
		'INSERT' 				=> 0,
		'UPDATE' 				=> 1,
		'DELETE' 				=> 9,

		'PAGINATION' 			=> 3, // number item in per page backend
		'MESSAGE_NO_ACCESS'		=> 'You do not have access!', // message when permission user login access
	),
];

include('function.php');