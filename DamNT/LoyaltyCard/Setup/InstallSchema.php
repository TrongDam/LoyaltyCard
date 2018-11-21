<?php
namespace DamNT\LoyaltyCard\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Function install
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $setup->getConnection()->addColumn(
            $setup->getTable('quote_payment'),
            'loyalty_card',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'Loyalty Card',
            ]
        );
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'loyalty_card',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'Loyalty Card',
            ]
        );
        $setup->endSetup();
    }
}
