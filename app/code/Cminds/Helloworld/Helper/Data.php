<?php
namespace Cminds\Helloworld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\ObjectManagerInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{
    protected $storeManager;
    protected $objectManager;

    const XML_PATH_HELLOWORLD = 'helloworld/';
    const XML_PATH_GENERAL = 'general/';

    public function __construct(
        Context $context,
        ObjectManagerInterface $objectManager,
        StoreManagerInterface $storeManager)
    {
        $this->objectManager = $objectManager;
        $this->storeManager  = $storeManager;

        parent::__construct($context);
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }


    public function getGeneralConfig($code, $storeId = null)
    {
        $a = $this->getConfigValue(self::XML_PATH_HELLOWORLD . self::XML_PATH_GENERAL. $code, $storeId);
        return 'From helper: ' . $a;
    }

    public function getName(){
        return 'Gosia';
    }

    public function getColor(){
        return 'red';
    }
}
