<?php

namespace Cminds\Helloworld\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Host extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('cminds_admin_host', 'id');
    }
}
