<?php

namespace Eglobe\PageNotFound\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
//use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel\CollectionFactory;
use Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel;
use Eglobe\PageNotFound\Model\PageNotFoundModelFactory;
use \Magento\Framework\UrlInterface;
//use \Magento\Framework\App\Request\Http;

class PageNotAvail implements ObserverInterface
{
    //protected $httpRequest;
    protected $urlInterface;
    //protected $timezone;
    protected $request;
    protected $resourcemodel;
    protected $PageNotFoundModelFactory;
    protected $collectionFactory;
    public function __construct (
        \Magento\Framework\UrlInterface $urlInterface,
        //\Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Framework\App\RequestInterface $request,
        \Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel $resourcemodel,
        \Eglobe\PageNotFound\Model\PageNotFoundModelFactory $PageNotFoundModelFactory,
        \Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel\CollectionFactory $collectionFactory
    ) { 
       // $this->httpRequest = $httpRequest;
        $this->urlInterface = $urlInterface;
        //$this->timezone = $timezone;
        $this->request = $request;  
        $this->resourcemodel = $resourcemodel;
        $this->PageNotFoundModelFactory = $PageNotFoundModelFactory;
        $this->collectionFactory = $collectionFactory;
        
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    { 
    
        $currentUrl = $this->urlInterface ->getCurrentUrl();
        //$fullaction = $this->httpRequest->getFullActionName(); 
        //$createtime = $this->timezone->date()->format('Y-m-d H:i:s');
        $model = $this->collectionFactory->create();  
        $model->addFieldToFilter('pageurl',['eq' => $currentUrl]);
                $FilteredData = $model->getFirstItem();

                $url_filter =$FilteredData->getPageurl();

                if($url_filter==$currentUrl)
                 {
                    $count = $FilteredData->getCount()+1;
                     $FilteredData->setPageurl($currentUrl);
                     $FilteredData->setCount($count);
                     //$FilteredData->setLastupdated($createtime);
                     $this->resourcemodel->save($FilteredData);
                  }
                  else
                  { 
                     $FilteredData->setPageurl($currentUrl);
                     $FilteredData->setCount(1);
                     //$FilteredData->setLastupdated($createtime);
                     $this->resourcemodel->save($FilteredData);
                  }   
 
    }

} 