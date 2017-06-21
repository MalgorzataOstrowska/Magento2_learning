<?php

namespace Cminds\Helloworld\Observer;

use Magento\Backend\Model\Auth\Session;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AdminHostAddress implements ObserverInterface
{
    protected $authSession;

    public function __construct(Session $authSession)
    {
        $this->authSession = $authSession;
    }

    public function execute(Observer $observer)
    {
        $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        $auth = $this->authSession;
        $userId = $auth->getUser()->getUserId();

        $objectManager = ObjectManager::getInstance();
        $model = $objectManager->create('Cminds\Helloworld\Model\Host');
        $model->setHost($host);
        $model->setUserId($userId);
        $model->save();

        $objectManager->get('Cminds\Helloworld\Helper\Host')->sendAdminHostEmail();
    }
}
