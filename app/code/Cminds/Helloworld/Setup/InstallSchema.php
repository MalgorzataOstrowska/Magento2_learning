<?php

namespace Cminds\Helloworld\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'greeting_message'
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('cminds_greeting_message'))
            ->addColumn(
                'greeting_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Greeting ID'
            )
            ->addColumn(
                'message',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                'Message'
            )->setComment("Greeting Message table");
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable('cminds_admin_host'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary'  => true,
                    'unsigned' => true,
                ],
                'ID'
            )
            ->addColumn(
                'user_id',
                Table::TYPE_INTEGER,
                null,
                ['nullable => false'],
                'User ID'
            )
            ->addColumn(
                'host',
                Table::TYPE_TEXT,
                255,
                ['nullable => false'],
                'Host'
            )
            ->setComment('Post Table');
        $setup->getConnection()->createTable($table);
    }
}
