    <?php
//Register module
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Eglobe_OutofstockCronjob',
    __DIR__
);
