<?php

namespace Cminds\Helloworld\Model\Resource\Host;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Cminds\Helloworld\Model\Host',
            'Cminds\Helloworld\Model\Resource\Host'
        );
    }
}
