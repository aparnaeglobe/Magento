<?php
namespace Eglobe\PageNotFound\Block\Adminhtml;
 
use Magento\Backend\Block\Widget\Grid\Container;
 
class Posts extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_posts';
        $this->_blockGroup = 'Eglobe_Helloworld';
        $this->_headerText = __('Log for 404 Pages');
        $this->_addButtonLabel = __('Add New Post');
        parent::_construct();
    }
}