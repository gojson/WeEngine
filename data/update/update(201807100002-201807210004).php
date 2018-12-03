<?php

pdo_query("UPDATE " . tablename('wxapp_versions') . " SET `last_modules` = `modules`;");

load()->model('setting');
pdo_delete('modules_cloud');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.7.8', '201807210004');
return true;
