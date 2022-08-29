<?php
namespace Shreyas\HelloWorld\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ChangeTaxTotal implements ObserverInterface
{
    
    public function execute(Observer $observer)
    {

        
        /** @var Magento\Quote\Model\Quote\Address\Total */
        //$total = $observer->getData('total');
        // echo "<pre>";
        // print_r($total);exit;
        $quote = $observer->getEvent()->getQuote();
        $total = $observer->getEvent()->getTotal();
        $subTotal = $quote->getSubtotal();
       // $subtotal = $total['subtotal'];
        
        $customTax = ($subTotal * 10)/100;
        
        // echo $subtotal;
        //echo $customTax;exit;
        // echo "<pre>";
        // print_r($subtotal);exit;

        //$total->addTotalAmount('tax', $customTax);

            $total->setTotalAmount('tax',$customTax);
            $total->setGrandTotal((float)$total->getGrandTotal() + $customTax);
            $total->setBaseTotalAmount('tax', $customTax);

        return $this;
    }
}