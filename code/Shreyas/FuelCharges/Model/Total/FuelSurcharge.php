<?php
namespace Shreyas\FuelCharges\Model\Total;

class FuelSurcharge extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this
     */
    protected $quoteValidator = null;
    protected $tablerateCollectionFactory;

    protected $customFee;

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CollectionFactory $tablerateCollectionFactory,
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
        $this->quoteValidator = $quoteValidator;
        $this->customerSession = $customerSession;
        $this->tablerateCollectionFactory = $tablerateCollectionFactory;
        $this->checkoutSession = $checkoutSession;
        // parent::__construct($context);
    }

    public function customFee()
    {

        $customer = $this->customerSession->getCustomer();

        if ($customer) {
            // $shippingAddress = $customer->getDefaultShippingAddress();

            // if ($shippingAddress) {
            //     $zipcode = $shippingAddress->getPostcode();
            // }
            $checkout = $this->checkoutSession->getQuote()->getShippingAddress();

            if ($customer) {
                $zipcode = $checkout->getPostcode();
            }
           
        }

        $collection = $this->tablerateCollectionFactory->create();

        $collection->addFieldToFilter('dest_zip', ['eq' => $zipcode]);

        if ($collection->getFirstItem()) {
            return $collection->getFirstItem()->getData('fuel_surcharge');
        }

    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

        $exist_amount = 0; //$quote->getCustomfee();
        // $customfee ; //enter amount which you want to set

        $customFee = $this->customFee();

        $balance = $customFee - $exist_amount; //final amount

        // $total->setTotalAmount('customfee', $balance);
        // $total->setBaseTotalAmount('customfee', $balance);

        $total->setCustomfee($balance);
        $total->setBaseCustomfee($balance);

        $total->setGrandTotal($total->getGrandTotal() + $balance);
        $total->setBaseGrandTotal($total->getBaseGrandTotal() + $balance);

        return $this;
    }

    protected function clearValues(\Magento\Quote\Model\Quote\Address\Total $total)
    {
        $total->setTotalAmount('subtotal', 0);
        $total->setBaseTotalAmount('subtotal', 0);
        $total->setTotalAmount('tax', 0);
        $total->setBaseTotalAmount('tax', 0);
        $total->setTotalAmount('discount_tax_compensation', 0);
        $total->setBaseTotalAmount('discount_tax_compensation', 0);
        $total->setTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setBaseTotalAmount('shipping_discount_tax_compensation', 0);
        $total->setSubtotalInclTax(0);
        $total->setBaseSubtotalInclTax(0);
    }
    /**
     * @param \Magento\Quote\Model\Quote $quote
     * @param Address\Total $total
     * @return array|null
     */
    /**
     * Assign subtotal amount and label to address object
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param Address\Total $total
     * @return array
     */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        return [
            'code' => 'customfee',
            'title' => 'Fuel Surcharge',
            'value' => $this->customFee(),
        ];
    }

    /**
     * Get Subtotal label
     *
     * @return \Magento\Framework\Phrase
     */
    public function getLabel()
    {
        return __('Fuel Surcharge');
    }

    public function getCustomerDeliveryPostcode()
    {
        $customer = $this->customerSession->getCustomer();
        if ($customer) {
            $shippingAddress = $customer->getDefaultShippingAddress();
            if ($shippingAddress) {
                return $shippingAddress->getPostcode();
            }
        }
    }

}
