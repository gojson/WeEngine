<?php

pdo_query("UPDATE " . tablename('account') . " AS ac SET ac.`type` = 1 WHERE ac.`uniacid` IN (SELECT w.`uniacid` FROM " . tablename('account_wechats') . " AS w) AND ac.`type` != 1 AND ac.`type` != 3");

load()->model('setting');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.8.2', '201812010002');
return true;
