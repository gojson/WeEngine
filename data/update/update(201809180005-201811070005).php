<?php

$birthmonth = pdo_getcolumn('profile_fields', array('field' => 'birthmonth'), 'field');
		$birthday = pdo_getcolumn('profile_fields', array('field' => 'birthday'), 'field');
		$credit1 = pdo_getcolumn('profile_fields', array('field' => 'credit1'), 'field');
		$credit2 = pdo_getcolumn('profile_fields', array('field' => 'credit2'), 'field');
		if (empty($birthmonth)) {
			pdo_insert('profile_fields', array('field' => 'birthmonth', 'available' => 0,'title' => '出生月份', 'description' => '出生月份'));
		}
		if (empty($birthday)) {
			pdo_insert('profile_fields', array('field' => 'birthday', 'available' => 0, 'title' => '出生日期', 'description' => '出生日期'));
		}
		if (empty($credit1)) {
			pdo_insert('profile_fields', array('field' => 'credit1', 'available' => 0, 'title' => '积分', 'description' => '积分'));
		}
		if (empty($credit2)) {
			pdo_insert('profile_fields', array('field' => 'credit2', 'available' => 0, 'title' => '余额', 'description' => '余额'));
		}

load()->model('setting');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.8.2', '201811070005');
return true;
