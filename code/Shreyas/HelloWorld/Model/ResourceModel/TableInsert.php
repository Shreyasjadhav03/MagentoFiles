<?php
namespace Shreyas\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class TableInsert extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sample_customer_data', 'id');
    }
}
