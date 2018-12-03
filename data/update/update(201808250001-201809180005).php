<?php

load()->model('setting');
cache_clean();

setting_upgrade_version(IMS_FAMILY, '1.8.2', '201809180005');
return true;
