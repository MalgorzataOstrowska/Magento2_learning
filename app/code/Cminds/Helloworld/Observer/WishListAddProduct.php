<?php

namespace Cminds\Helloworld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class WishListAddProduct implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $product = $observer->getData('product');
        echo $productName = $product->getName();

        $wishlist = $observer->getData('wishlist');
        $item = $observer->getData('item');

        die;
    }
}