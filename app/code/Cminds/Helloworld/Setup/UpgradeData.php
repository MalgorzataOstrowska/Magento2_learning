<?php

namespace Cminds\Helloworld\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.1') < 0
        ) {
            $table = $setup->getTable('cminds_greeting_message');
            $setup->getConnection()
                ->insertForce($table, ['message' => 'Happy Thanksgiving', 'season' => 'fall']);

            $setup->getConnection()
                ->update($table, ['season' => 'winter'], 'greeting_id IN (1,2)');
        }

        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.2') < 0
        ) {
            $table = $setup->getTable('cminds_helloworld_post');
            $setup->getConnection()
                ->insertForce($table, ['name' => "Sample title 1",
                    'post_content' => "Sample content by Mageplaza.com"]);
        }
        $setup->endSetup();
    }
}