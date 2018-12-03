<?php

load()->model('setting');
pdo_delete('modules_cloud');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.8.1', '201808250001');
return true;
