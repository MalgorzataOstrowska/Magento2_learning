<?php
namespace Cminds\Helloworld\Block;

use Cminds\Helloworld\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class Helloworld extends Template
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    protected $objectManager;


    /**
     * Helloworld constructor.
     * @param Template\Context $context
     * @param array $data
     * @param Data $dataHelper
//     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        Data $dataHelper
//        ScopeConfigInterface $scopeConfig     // Errors during compilation:
                                                // Incorrect dependency in class (...) ScopeConfigInterface already exists in context object

                                                // this class is already part of the parent
    )
    {
        $this->helper = $dataHelper;
//        $this->scopeConfig = $scopeConfig;

        parent::__construct($context, $data);
    }

    public function getHelloWorldText()
    {
        $color =  $this->helper->getColor();

        return 'Hello ' . $color . ' world!';
    }

    public function getTextFromConfiguration()
    {
        return 'From block: ' . $this->scopeConfig->getValue('helloworld/general/display_text', ScopeInterface::SCOPE_STORE);
    }

    public function getTextFromConfigurationFromHelperThroughBlock(){
        return 'From block: ' . $this->helper->getGeneralConfig('display_text');
    }
}