<?php
namespace Cminds\Helloworld\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class Host extends AbstractHelper
{
    protected $storeManager;
    protected $transportBuilder;


    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        TransportBuilder $transportBuilder)
    {
        $this->storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;

        parent::__construct($context);
    }

    public function sendAdminHostEmail()
    {
        $store = $this->storeManager->getStore()->getId();
        $transport = $this->transportBuilder->setTemplateIdentifier('admin_host_email_template')
            ->setTemplateOptions(['area' => 'frontend', 'store' => $store])
            ->setTemplateVars(
                [
                    'store' => $this->storeManager->getStore(),
                ]
            )
            ->setFrom('general')
            // you can config general email address in Store -> Configuration -> General -> Store Email Addresses
            ->addTo('ostrowska.malgorzata.ewa@gmail.com', 'Customer Name')
            ->getTransport();
        $transport->sendMessage();
    }
}
