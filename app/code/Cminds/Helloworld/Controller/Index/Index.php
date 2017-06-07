<?php

namespace Cminds\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\DataObject;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action

{
    protected $_resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $textDisplay = new DataObject(array('text' => 'Mageplaza'));
        $this->_eventManager->dispatch('cminds_helloworld_display_text', ['text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;

        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }
}