<?php
    namespace Eglobe\ShopCartModule\Block\Widget;
    use Magento\Framework\View\Element\Template;
    use Magento\Widget\Block\BlockInterface;
    use Magento\Catalog\Model\ResourceModel\Category;
    class TopCategorieswidget extends Template implements BlockInterface
    {
        /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    protected $_categoryCollectionFactory;

    /**
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_categoryHelper;

    /**
     * Subcategories constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {
        $this->_registry = $registry;
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_categoryHelper = $categoryHelper;
        parent::__construct($context, $data);
    }


    public function getCurrentCategory()
    {
        return $this->_registry->registry('current_category');
    }


    public function getCategoryCollection(){
        $_category = $this->getCurrentCategory();
        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*')
            ->addAttributeToFilter('top_cat_status', '1')
            ->addAttributeToFilter('is_active', 1);

        return $collection;
    }
        protected $_template = "widget/topcategorieswidget.phtml";
    }