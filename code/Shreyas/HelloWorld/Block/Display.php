<?php
namespace Shreyas\HelloWorld\Block;

class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}
    // The Block file should contain all the view logic required, it should not contain any kind of html or css. Block file are supposed to have all application view logic.

    //Every block in Magento 2 must extend from Magento\Framework\View\Element\Template
	public function sayHello()
	{
		return __('Hello World'); 
	}
}
