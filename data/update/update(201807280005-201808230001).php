<?php

pdo_query("DELETE FROM " . tablename('message_notice_log') . " WHERE `type` IN (10,11)");

if (pdo_fieldexists('modules_recycle', 'modulename')) {
			pdo_query("DELETE FROM " . tablename('modules_recycle') . " WHERE `modulename` <> '' AND (`name` = '' OR `name` IS NULL);");
		}
		pdo_query(
			"DELETE r FROM " . tablename('modules_recycle') .
			" r LEFT JOIN " . tablename('modules') .
			" m ON r.name = m.name WHERE r.type = 1 AND m.mid IS NULL;"
		);

load()->model('setting');
pdo_delete('modules_cloud');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.8.0', '201808230001');
return true;
