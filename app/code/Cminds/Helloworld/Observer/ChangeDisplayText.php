<?php

namespace Cminds\Helloworld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function __construct()
    {
    }

    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('text');
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}