<?php
namespace Shreyas\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('shreyas_helloworld_post')) { //table name
				$table = $installer->getConnection()->newTable(
					$installer->getTable('shreyas_helloworld_post')
				)
					->addColumn(
						'id', //id column added
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'nullable' => false, 'primary' => true],
                        'Record Id'
					)
					->addColumn(
                        'name', //name column added
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        255,
                        ['nullable' => false],
                        'Name'
					)
					->addColumn(
						'email', //email column created
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '255',
                        ['nullable' => false],
                        'Email'
					)
					->addColumn(
                        'telephone', //contact column created
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '255',
                        ['nullable' => false],
                        'Telephone'
					)
					
					->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
					)
                    ->addColumn(
						'updated_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
						'Updated At')
					->setComment('Post Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('shreyas_helloworld_post'),
					$setup->getIdxName(
						$installer->getTable('shreyas_helloworld_post'),
						['name','email','telephone'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['name','email','telephone'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}

		$installer->endSetup();
	}
}