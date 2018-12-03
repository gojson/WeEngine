<?php

$data = pdo_getall('uni_group', array(), array('id', 'modules'));
		foreach ($data as $row) {
			$row['modules'] = iunserializer($row['modules']);
			if (empty($row['modules'])) {
				continue;
			}
			if (!isset($row['modules']['modules']) && !isset($row['modules']['wxapp']) && !isset($row['modules']['webapp']) && !isset($row['modules']['xzapp'])) {
				$new_row = array('modules' => $row['modules'], 'wxapp' => $row['modules'], 'webapp' => $row['modules'], 'xzapp' => $row['modules'], 'phoneapp' => $row['modules']);
				pdo_update('uni_group', array('modules' => iserializer($new_row)), array('id' => $row['id']));
			}
		}

load()->model('setting');
pdo_delete('modules_cloud');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.7.8', '201807210005');
return true;
