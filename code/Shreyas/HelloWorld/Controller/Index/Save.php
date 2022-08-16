<?php
 
namespace Shreyas\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;
use Shreyas\HelloWorld\Api\TableInsertRepositoryInterface;
use Shreyas\HelloWorld\Model\TableInsert;
use Shreyas\HelloWorld\Model\ResourceModel\TableInsert as formResourceModel;
class Save extends Action
{
    protected $forminterface;
    private $formrepositoryinterface;
    private $data;

    public function __construct(
       TableInsertInterface $forminterface,
        TableInsertRepositoryInterface  $formrepositoryinterface,
        Context $context,
        TableInsert $data
        ,
        formResourceModel $formResourceModel

    )
    {
        $this->data=$data;
        $this->forminterface = $forminterface;
        $this->formrepositoryinterface = $formrepositoryinterface;
        $this->context=$context;
        $this->formResourceModel = $formResourceModel;
        parent::__construct($context);
    }

    public function execute()

    {
        $params = $this->getRequest()->getParams();
        //$model=$this->_objectManager->create('Shreyas\HelloWorld\Model\TableInsert');
        $model=$this->data->setData($params);
        $model->setData($params);
        // //var_dump($params['name']);
        // $this->forminterface->setName($params['name']);
        //$this->forminterface->setEmail($params['email']);
         //$this->forminterface->setTelephone($params['telephone']);
        // //var_dump($this->formResourceModel);

        // echo'<pre>';
        // print_r($params);
        //exit;
       

        try {
            $this->formResourceModel->save($model);
            $this->messageManager->addSuccessMessage(__("Successfully added the Form %1", $params['name']));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong....."));
            // print_r($e->getMessage());exit;
            
        }


        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('helloworld/index/customerform');
        return $redirect;
        
        
    }
    
}
