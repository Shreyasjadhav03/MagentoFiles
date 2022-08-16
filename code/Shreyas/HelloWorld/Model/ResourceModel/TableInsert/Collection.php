<?php

namespace Shreyas\HelloWorld\Model\ResourceModel\TableInsert;

use Shreyas\HelloWorld\Model\ResourceModel\TableInsert as FormResourceModel;
use Shreyas\HelloWorld\Model\TableInsert;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
 

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(TableInsert::class,FormResourceModel::class);
    }
}