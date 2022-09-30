<?php

namespace Eglobe\StoreModule\Plugin\Observer;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RestrictCmsPage implements ObserverInterface
{
    
    protected $_actionFlag;
    
    protected $_cmsPage;

    protected $request;

    public function __construct (
        CustomerSession $customerSession,
        \Magento\Framework\App\ActionFlag $actionFlag,
        \Magento\Cms\Model\Page $cmsPage,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\RequestInterface $request//contain definition for getModuleName()
    ) {
        $this->customerSession = $customerSession;
        $this->_actionFlag = $actionFlag;
        $this->_cmsPage = $cmsPage;
        $this->redirect = $redirect;
        $this->request = $request;  
    }
    public function execute(Observer $observer)
    { 
        if($this->request->getModuleName() == "cms"){
            if (!$this->customerSession->authenticate()) {
                $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
                if (!$this->customerSession->getBeforeUrl()) {
                    $this->customerSession->setBeforeUrl($this->redirect->getRefererUrl());
                }
            }
        }
        return  $this;
    }
}