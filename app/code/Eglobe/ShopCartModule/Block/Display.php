<?php
namespace Eglobe\ShopCartModule\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_logo;	
	
	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magento\Theme\Block\Html\Header\Logo $logo,
		array $data = []
	)
	{		
		$this->_logo = $logo;
		parent::__construct($context, $data);
	}
	
	/**
     * Get logo image URL
     *
     * @return string
     */
    public function getLogoSrc()
    {	
		return $this->_logo->getLogoSrc();
	}

}	
?>
