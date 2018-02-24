<?php

return [

	'formguard' => [
		
		/**
		 * honey trap fields
		 *
		 * @var array
		 **/
		
		'honeyTrapFields' =>	[
			'text1',
			'text2',
		],

		/**
		 * form fields expected to contain an email address
		 *
		 * @var array
		 **/
	
		'emailFields' =>	[
			'email'
		],
		
		/**
		 * form fields that won't usually contain links
		 *
		 * @var array
		 **/
		
		'noLinkFields'	=>	[
			'first_name',
			'last_name',
			'mobile',
			'phone',
		],

		/**
		 * form fields expected to contain a phone number
		 *
		 * @var array
		 **/
		
		'phoneFields'	=>	[
			'mobile',
			'phone',
		],

		/**
		 * form fields expected to contain a message, usually a textarea form field
		 *
		 * @var string
		 **/
		
		'messageFields'	=>	[
			'message',
			'enquiry_detail',
			'comment',
			'custom_5',
		],

		/**
		 * form fields expected to contain a name
		 *
		 * @var string
		 **/
		'nameFields'	=>	[
			'first_name',
			'last_name',
		],

		/**
		 * fields which are visible to the human user
		 *
		 * @var string
		 **/
		
        'visibleFields'	=>	[
        	'first_name',
        	'last_name',
        	'email',
        	'phone',
        	'mobile',
        	'town',
        	'address',
        	'country',
        	'custom_1',
        	'custom_2',
        	'custom_3',
        	'custom_4',
        	'custom_5'
        ],
	]
];