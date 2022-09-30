<?php

declare(strict_types=1);

namespace Eglobe\SampleBlock\Controller\Page;

use Magento\Framework\Controller\Result\Json;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class View extends Action
{
    public function execute() {
		
		echo "View file in Sample Block has got preference over view on Store Module!";
       
    }
}
