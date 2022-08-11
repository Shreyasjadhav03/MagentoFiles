<?php
namespace Shreyas\HelloWorld\Model;

use Shreyas\HelloWorld\Api\TableInsertRepositoryInterface;
use Shreyas\HelloWorld\Model\ResourceModel\TableInsert as Resource;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;
class TableInsertRepository implements TableInsertRepositoryInterface 
{

    private $resource;
    private $table;

    public function __construct(
        Resource $resource
        
    )
    {
        $this->resource= $resource;
    
    }

     /**
     * @param \Shreyas\HelloWorld\Api\Data\TableInsertInterface $tableInsert
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function save(TableInsertInterface $tableInsert){
        //call save on resource obj (Data InterFace)
        $this->resource->save($tableInsert);
        return $tableInsert;
    }

}

