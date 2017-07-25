<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'requirements' => [		'title' => 'Requirements',		'created_at' => 'Time',		'fields' => [		],	],
		'time-work-types' => [		'title' => 'Work types',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'time-projects' => [		'title' => 'Projects',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'time-entries' => [		'title' => 'Time entries',		'created_at' => 'Time',		'fields' => [			'work-type' => 'Work type',			'project' => 'Project',			'start-time' => 'Start time',			'end-time' => 'End time',		],	],
		'time-reports' => [		'title' => 'Reports',		'created_at' => 'Time',		'fields' => [		],	],
		'request-to-technical' => [		'title' => 'Request to technical',		'created_at' => 'Time',		'fields' => [			'project' => 'Project',			'work-type' => 'Work type',			'priority' => 'Priority',			'request-name' => 'Request name',			'small-description' => 'Small description',			'upload-customer-sign-off-files' => 'Upload customer sign off files',			'assigned-person' => 'Assigned person',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'status' => [		'title' => 'Status',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'description' => 'Description',		],	],
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'quickadmin_title' => 'IFS Technical Requirement Gathering',
];