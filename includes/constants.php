<?php

// General
define('EMPTY_DATE','0000-00-00 00:00:00');
define('IDAPROCOM',1);
define('EURO',chr(128));
define('MASTER_LOGIN',"Eaprocom");
define('MASTER_PASS',"9Digitos2015");
define('REMITTANCE_PREFIX',"B2BAPR");

// User types
define('_UT_APROCOM', 1);
define('_UT_ASSOCIATION', 2);
define('_UT_ASSOCIATED', 3);
define('_UT_FRIEND', 4);
define('_UT_FREE', 5);

// User status
define('_US_NON_ACTIVE', 0);
define('_US_ACTIVE', 1);
define('_US_TOVALIDATE', 2); // Non real
define('_US_TOACTIVATE', 3); // Non real

// PRINT TYPES
define('_PT_NOTIFICATIONS', 0);
define('_PT_PAYMENTS', 1);
define('_PT_USERS', 2);
define('_PT_AUDITS', 3);

// User Permission Types
define('_PET_USER', 0);
define('_PET_ASSOCIATION', 1);
define('_PET_ASSOCIATED', 2);

// Permission Types
define('_PT_WRITE', 1);
define('_PT_READ', 2);
define('_PT_DELETE', 3);
define('_PT_CREATEFEE', 4);
define('_PT_CREATEREMITTENCE', 5);
define('_PT_VALIDATENOTIFICATIONS', 6);
define('_PT_VALIDATEUSERS', 7);

// General Status
define('_ACTIVE', 1);
define('_NON_ACTIVE', 0);
define('_AUX_VALUE', -1);

// Email type
define('_ET_NORMAL', "NORMAL");
define('_ET_ACTIVATION', "ACTIVATION");
define('_ET_SENSITIVE', "SENSITIVE");

// Notification Types

define('_NT_ALL',0);
define('_NT_SECURITY',1);
define('_NT_CLEANING',2);
define('_NT_TRAFFIC',3);
define('_NT_WORKS',4);
define('_NT_LIGHTNING',5);
define('_NT_PENALIZATION',6);
define('_NT_TIMETABLE',7);
define('_NT_ALERT',8);
define('_NT_UNFAIR',9);
define('_NT_OFFERS',10);
define('_NT_AGREEMENT',11);

// Notification Images
define('_NOTIFICATION_IMAGES_URL','vars/notification/image/');
define('_DEFAULTNOTICIATION','views/layout/default/img/defaultNotification.png');
define('_DEFAULTNOTICIATIONTHUMB','views/layout/default/img/defaultNotificationThumb.png');

// Uploas url
define('_UU_DEFAULT',BASE_URL.'vars/upload/');

// Question Response Type
define('_RT_YESNO',1);
define('_RT_RANGE',2);

// Answer Yes/NO
define('_ANSWER_YES', 1);
define('_ANSWER_IMPARTIAL', 2);
define('_ANSWER_NO', -1);

// Answer Range
define('_ANSWER_VALUE_1', 1);
define('_ANSWER_VALUE_2', 2);
define('_ANSWER_VALUE_3', 3);
define('_ANSWER_VALUE_4', 4);
define('_ANSWER_VALUE_5', 5);

// Upload type
define('_UPT_AGREEMENT',1);
define('_UPT_TIMETABLE',2);
define('_UPT_OTHER',3);
define('_UPT_POLL',4);

// Upload formats
define('_UF_JPG','image/jpeg');
define('_UF_PDF','application/pdf');

// Payment status
define('_PS_NOT_PAID',0);
define('_PS_PAID',1);

// Payments Standar Periods
define('_PSP_1',1);
define('_PSP_2',2);
define('_PSP_3',3);
define('_PSP_6',6);
define('_PSP_12',12);

/* Audit types */
	
	// GENERAL
	define('_AT_ERROR',-1);
	define('_AT_GENERAL',0);

	// PAYMENTS
	define('_AT_ADD_PAYMENT',1);
	define('_AT_SAVE_PAYMENT',2);
	define('_AT_DELETE_PAYMENT',3);

	// NOTIFICATIONS
	define('_AT_ADD_NOTIFICATION',4);
	define('_AT_SAVE_NOTIFICATION',5);
	define('_AT_DELETE_NOTIFICATION',6);

	// USER
	define('_AT_ADD_USER',7);
	define('_AT_SAVE_USER',8);
	define('_AT_DELETE_USER',9);
	define('_AT_LOGIN_USER',10);
	define('_AT_LOGOUT_USER',11);
	define('_AT_SIGNUP_USER',12);

	// EMAIL
	define('_AT_SENDNORMAL_EMAIL',13);
	define('_AT_SENDSECONDFORM_EMAIL',14);
	define('_AT_SENDACTIVATION_EMAIL',15);

	// PERMISSION
	define('_AT_ADD_PERMISSION',16);
	define('_AT_SAVE_PERMISSION',17);
	define('_AT_DELETE_PERMISSION',18);

	// POLL
	define('_AT_ADD_POLL',19);
	define('_AT_SAVE_POLL',20);
	define('_AT_DELETE_POLL',21);
	define('_AT_COMPLETED_POLL',22);

	// QUERY
	define('_AT_SENDED_QUERY',23);

	// UPLOAD
	define('_AT_ADD_IMAGE',24);
	define('_AT_DELETE_IMAGE',25);

	// ZONE
	define('_AT_SAVE_ZONE',26);


?>