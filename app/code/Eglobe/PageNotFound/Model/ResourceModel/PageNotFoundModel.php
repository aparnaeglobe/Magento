<?php
namespace Eglobe\PageNotFound\Model\ResourceModel;
class PageNotFoundModel extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define the main table
     */
    protected function _construct()
    {
    $this->_init('page_search_log_table', 'id');   //here id is the primary key of custom table
    }
}