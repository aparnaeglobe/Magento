<?php
namespace Eglobe\ShopcartModule\Model\Category\Attribute\Backend\Thumb;

/**
 * Interceptor class for @see \Eglobe\ShopcartModule\Model\Category\Attribute\Backend\Thumb
 */
class Interceptor extends \Eglobe\ShopcartModule\Model\Category\Attribute\Backend\Thumb implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Psr\Log\LoggerInterface $logger, \Magento\Framework\Filesystem $filesystem, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory)
    {
        $this->___init();
        parent::__construct($logger, $filesystem, $fileUploaderFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function validate($object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validate');
        return $pluginInfo ? $this->___callPlugins('validate', func_get_args(), $pluginInfo) : parent::validate($object);
    }
}
