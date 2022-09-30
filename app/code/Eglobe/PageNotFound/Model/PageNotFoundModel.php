<?php
namespace Eglobe\PageNotFound\Model;
use Magento\Framework\Model\AbstractModel;
class PageNotFoundModel extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
    $this->_init('\Eglobe\PageNotFound\Model\ResourceModel\PageNotFoundModel');
    }
}