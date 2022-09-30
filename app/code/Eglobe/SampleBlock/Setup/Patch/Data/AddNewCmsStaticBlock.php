<?php

/**

 * @author TheOnlineHelper

 * @package Eglobe_SampleBlock

 */

namespace Eglobe\SampleBlock\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Framework\Setup\Patch\PatchVersionInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Cms\Model\BlockFactory;

/**
 * Class AddNewCmsStaticBlock

 * @package Rbj\CmsBlock\Setup\Patch\Data

 */

class AddNewCmsStaticBlock implements DataPatchInterface, PatchVersionInterface
{

    /**

    * @var ModuleDataSetupInterface

    */

    private $moduleDataSetup;
    /**

    * @var BlockFactory

    */

    private $blockFactory;

    /**

    * AddAccessViolationPageAndAssignB2CCustomers constructor.

    * @param ModuleDataSetupInterface $moduleDataSetup

    * @param PageFactory $blockFactory

    */
    public function __construct(

        ModuleDataSetupInterface $moduleDataSetup,

        BlockFactory $blockFactory

    ) {

        $this->moduleDataSetup = $moduleDataSetup;

        $this->blockFactory = $blockFactory;
    }
    /**

    * {@inheritdoc}

    */

    public function apply()

    {
        $newCmsStaticBlock = [

            'title' => 'Sample CMS Block',

            'identifier' => 'sample-cms-block',

            'content' => '<p class="sample-block">Added a Sample CMS Block Programmatically</p>',

            'is_active' => 1,

            'stores' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
        ];
        $this->moduleDataSetup->startSetup();
        /** @var \Magento\Cms\Model\Block $block */

        $block = $this->blockFactory->create();

        $block->setData($newCmsStaticBlock)->save();
        $this->moduleDataSetup->endSetup();

    }
    /**

    * {@inheritdoc}

    */

    public static function getDependencies()

    {
        return [];
    }

    /**

    * {@inheritdoc}

    */

    public static function getVersion()

    {
        return '2.0.0';
    }

    /**

    * {@inheritdoc}

    */

    public function getAliases()

    {
        return [];
    }

}