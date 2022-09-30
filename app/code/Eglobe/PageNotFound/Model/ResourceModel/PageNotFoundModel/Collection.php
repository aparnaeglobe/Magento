<?php
namespace Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
    $this->_init(
        'Eglobe\PageNotFound\Model\PageNotFoundModel',
        'Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel'
    );
    
    }
}