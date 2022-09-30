<?php
namespace Eglobe\PageNotFound\Controller\Adminhtml\PageNotFoundModel;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Eglobe_PageNotFound::log_manage');
        $resultPage->getConfig()->getTitle()->prepend((__('404 LOG')));
        return $resultPage;
    }
}