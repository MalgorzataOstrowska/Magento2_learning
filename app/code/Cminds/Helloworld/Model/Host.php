<?php

namespace Cminds\Helloworld\Model;

use Magento\Framework\Model\AbstractModel;

class Host extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Cminds\Helloworld\Model\Resource\Host');
    }
}
