<?php

namespace Shreyas\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Shreyas\HelloWorld\Model\TableInsert as form;
use Shreyas\HelloWorld\Model\ResourceModel\TableInsert as formResourceModel;

class Save extends Action
{
    /**
     * @var form
     */
    protected $form;
    /**
     * @var formResourceModel
     */
    protected $formResourceModel;

    /**
     * Add constructor.
     * @param Context $context
     * @param form $Form
     * @param formResourceModel $FormResourceModel
     */
    public function __construct(
        Context $context,
        form $form,
        formResourceModel $formResourceModel
    ) {
        $this->form = $form;
        $this->formResourceModel = $formResourceModel;
        parent::__construct($context);
    }

    public function execute()
    {
        // if (!$this->getRequest()->isPost) {
        //     return $this->resultRedirectFactory->create()->setPath('*/*/');
        // }
       
        $params = $this->getRequest()->getParams();
       
           array_pop($params);
           var_dump($params);
           

        $form = $this->form->setData($params);//TODO: Challenge Modify here to support the edit save functionality

        try {
            $this->formResourceModel->save($form);
            $this->messageManager->addSuccessMessage(__("Successfully added the Form %1", $params['name']));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Something went wrong....."));
            //$e->getMessage();
            
        }
        // / Redirect back to Form display page /
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('*/*/');
        return $redirect;
    }




    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('first_name')) === '') {
            throw new LocalizedException(__('Enter the First Name and try again.'));
        }
		if (trim($request->getParam('last_name')) === '') {
            throw new LocalizedException(__('Enter the Last Name and try again.'));
        }
		if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
		if (trim($request->getParam('phone')) === '') {
            throw new LocalizedException(__('Enter the Phone Number and try again.'));
        }
		if (trim($request->getParam('message')) === '') {
            throw new LocalizedException(__('Enter your message and try again.'));
        }
        return $request->getParams();
    }
}