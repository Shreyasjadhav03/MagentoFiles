<?php
 
namespace Shreyas\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;
use Shreyas\HelloWorld\Api\TableInsertRepositoryInterface;
use Shreyas\HelloWorld\Model\TableInsert;
use Shreyas\HelloWorld\Model\ResourceModel\TableInsert as formResourceModel;
class Save1 extends Action
{
    protected $tableinsertinterface;
    private $tableinsertrepositoryinterface;
    private $data;

    public function __construct(
        TableInsertInterface $tableinsertinterface,
        TableInsertRepositoryInterface  $tableinsertrepositoryinterface,
        Context $context,
        TableInsert $data,
        formResourceModel $formResourceModel

    )
    {
        $this->data=$data;
        $this->tableinsertinterface = $tableinsertinterface;
        $this->tableinsertrepositoryinterface = $tableinsertrepositoryinterface;
        $this->context=$context;
        $this->formResourceModel = $formResourceModel;
        parent::__construct($context);
    }

    public function execute()

    {
        $params = $this->getRequest()->getParams();
        //print_r($params);
        //var_dump($params);
        //$tableinsertinterface=$this->TableInsertInterface;
        $this->tableinsertinterface->setName($params['name']);
        $this->tableinsertinterface->setEmail($params['email']);
        $this->tableinsertinterface->setTelephone($params['telephone']);

        try {
            $this->formResourceModel->save($this->data);
            $this->messageManager->addSuccessMessage(__("Successfully added the Form %1", $params['name']));
        } catch (\Exception $e) {
            //$this->messageManager->addErrorMessage(__("Something went wrong....."));
            $e->getMessage();
            
        }
        
        
    }
    
}
// Controller save
// Add API/Data and repository interface object in construct

// In execute ,

// $apidata = $this->apiData;
// $apiData->setColumn();

// $this->repository->save($apidata);