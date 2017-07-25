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
		'request-to-technical' => [		'title' => 'Request to technical',		'created_at' => 'Time',		'fields' => [			'project' => 'Project',			'work-type' => 'Work type',			'priority' => 'Priority',			'request-name' => 'Request name',			'small-description' => 'Small description',			'upload-customer-sign-off-files' => 'Upload customer sign off files',			'assigned-person' => 'Assigned person',			'name' => 'Name',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'status' => [		'title' => 'Status',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'description' => 'Description',		],	],
	'qa_create' => 'Oluştur',
	'qa_save' => 'Kaydet',
	'qa_edit' => 'Düzenle',
	'qa_view' => 'Görüntüle',
	'qa_update' => 'Güncelle',
	'qa_list' => 'Listele',
	'qa_no_entries_in_table' => 'Tabloda kayıt bulunamadı',
	'custom_controller_index' => 'Özel denetçi dizini.',
	'qa_logout' => 'Çıkış yap',
	'qa_add_new' => 'Yeni ekle',
	'qa_are_you_sure' => 'Emin misiniz?',
	'qa_back_to_list' => 'Listeye dön',
	'qa_dashboard' => 'Kontrol Paneli',
	'qa_delete' => 'Sil',
	'quickadmin_title' => 'IFS Technical Requirement Gathering',
];