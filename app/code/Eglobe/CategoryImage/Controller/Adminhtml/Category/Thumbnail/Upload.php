<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Eglobe\CategoryImage\Controller\Adminhtml\Category\Thumbnail;

use Eglobe\CategoryImage\Controller\Adminhtml\AbstractUpload;

/**
 * Class Upload
 */
class Upload extends AbstractUpload
{
    const CATEGORY_ATTRIBUTE_IMAGE = 'thumbnail';

    /**
     * {@inheritdoc}
     */
    protected function getCategoryAttributeImage()
    {
        return self::CATEGORY_ATTRIBUTE_IMAGE;
    }
}
