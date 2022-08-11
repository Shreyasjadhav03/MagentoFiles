<?php
namespace Shreyas\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
    //We have to declare the PageFactory and create it in execute method to render view.

	public function execute() //this function is to be executed 
	{
		echo "Hello World";
		
		return $this->_pageFactory->create(); 
		
	}
}