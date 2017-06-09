<?php
namespace Cminds\Helloworld\Block;

use Cminds\Helloworld\Helper\Data;
use Magento\Framework\View\Element\Template;

class Helloworld extends Template
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * Helloworld constructor.
     * @param Template\Context $context
     * @param array $data
     * @param Data $dataHelper
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        Data $dataHelper
    )
    {
        parent::__construct($context, $data);
        $this->helper = $dataHelper;
    }

    public function getHelloWorldText()
    {
        $color =  $this->helper->getColor();

        return 'Hello ' . $color . ' world!';
    }

    public function getTextFromConfigurationFromHelperThroughBlock(){
        return 'From block: ' . $this->helper->getGeneralConfig('display_text');
    }
}