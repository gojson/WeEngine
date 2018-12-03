<?php


load()->model('setting');
pdo_delete('modules_cloud');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.7.9', '201807280005');
return true;
