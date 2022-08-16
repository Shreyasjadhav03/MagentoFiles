<?php
namespace Shreyas\HelloWorld\Model;

use Shreyas\HelloWorld\Api\TableInsertRepositoryInterface;
use Shreyas\HelloWorld\Model\ResourceModel\TableInsert;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;

class TableInsertRepository implements TableInsertRepositoryInterface 
{
    /**
     * @var Form
     */
    private $formFactory;

    /**
     * @var Form
     */
    private $formResource;

    

    public function __construct(
        TableInsert $formResource
        
    )
    {
        $this->formResource= $formResource;
    
    }

     /**
     * @param \Shreyas\HelloWorld\Api\Data\TableInsertInterface $form
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function save(TableInsertInterface $form){
        //call save on resource obj (Data InterFace)
        $this->formResource->save($form);
        return $form;
    }

}

