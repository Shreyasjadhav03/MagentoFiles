<?php
 
namespace Shreyas\HelloWorld\Plugin;
 
class CustomPrice
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 100;
    }
}