<?php
namespace Shreyas\HelloWorld\Block;

class CustomerForm extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data=[])
	{
		parent::__construct($context,$data);
	}
    // The Block file should contain all the view logic required, it should not contain any kind of html or css. Block file are supposed to have all application view logic.

    //Every block in Magento 2 must extend from Magento\Framework\View\Element\Template
	public function getFormAction()
	{
		//return __('Hello World'); 

        return $this->getUrl('helloworld/index/customerform', ['_secure' => true]);
	}
}
