<?php
namespace Eglobe\CronJob\Cron;
use \Magento\Catalog\Model\ResourceModel\Product\Collection;
use Eglobe\CronJob\Logger\Logger;
class Outofstock
{
    /**
     * Logging instance
     * @var \Eglobe\CronJob\Logger\Logger
     */
    protected $_logger;
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * @var \Magento\Catalog\Model\Product\Attribute\Source\Status
     */
    protected $productStatus;

    /**
     * @var  \Magento\Catalog\Model\Product\Visibility
     */
    protected $productVisibility;

    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $_productFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus
     * @param \Magento\Catalog\Model\Product\Visibility $productVisibility
     
     */

    /**
     * Constructor
     * @param \Eglobe\CronJob\Logger\Logger $logger
     */
    public function __construct(
        \Eglobe\CronJob\Logger\Logger $logger,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Catalog\Model\Product\Attribute\Source\Status $productStatus,
        \Magento\Catalog\Model\Product\Visibility $productVisibility
    
    ) {
        $this->_logger = $logger;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
        $this->productStatus = $productStatus;
        $this->productVisibility = $productVisibility;
     
    }

    public function execute()
    {
        //$this->_logger->info("test demo");
        $productCollection = $this->productCollectionFactory
                ->create()
                ->addAttributeToSelect('*')
                ->joinField('stock_item', 'cataloginventory_stock_item', 'is_in_stock', 'product_id=entity_id', 'is_in_stock=0')
                ->load();
               //$a = $productCollection->getAllIds();
               $b = $productCollection->getData();
               foreach($b as $val){
                //$this->logger->info('SKU : ' . $val->getSku());
               $log =  "SKU : ".$val['sku']. " Entity ID : ".$val['entity_id']." Created At : ".$val['created_at']."\n"; 
              $this->_logger->info($log); 
               
               }
    }
}