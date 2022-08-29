<?php 

namespace Shreyas\HelloWorld\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dbVersion = $context->getVersion();

        if (version_compare($dbVersion, '1.1.2', '<')) {
            /** @var CustomerSetup $customerSetup */
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
            $customerSetup->addAttribute(
                Customer::ENTITY,
                'example',
                [
                    'label' => 'Example Attribute',
                    'required' => 0,
                    'system' => 0, // <-- important, otherwise values aren't saved.
                                   // @see Magento\Customer\Model\Metadata\CustomerMetadata::getCustomAttributesMetadata()
                    'position' => 100,
                    'is_used_in_grid' => 1,   //setting grid options
                    'is_visible_in_grid' => 1,
                    'is_filterable_in_grid' => 1,
                    'is_searchable_in_grid' => 1,
                    ]
                    );
            $customerSetup->getEavConfig()->getAttribute('customer', 'example')
                ->setData('used_in_forms', ['adminhtml_customer','customer_account_edit','customer_account_create'])
                ->save();
        }
    }
}