<?php
namespace Eglobe\AppendSiteName\Plugin\Catalog\Model;

class Products
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject,$result)
    {
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        

            $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');

            $storeName =  $storeManager->getStore()->getName();
            
            return $storeName." : ".$result;    
    }
}