<?php

$installer = $this;

$installer->run("ALTER TABLE {$installer->getTable('cron_schedule')} ADD (`payload` TEXT NULL)");

$installer->endSetup();
