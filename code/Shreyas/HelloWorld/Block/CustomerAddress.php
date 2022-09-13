<?php
// namespace Shreyas\HelloWorld\Block;

// use Magento\Customer\Api\Data\AddressInterface;


// class CustomerAddress extends \Magento\Framework\View\Element\Template
// {

// protected $customer;


// public function __construct(\Magento\Customer\Model\Session $customer,
// \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
// \Magento\Customer\Api\AccountManagementInterface $accountManagement,

// AddressInterface $addressInterface
// )


// {
//     $this->customerRepository = $customerRepository;
//     $this->customer = $customer;
//     $this->addressInterface=$addressInterface;
//     $this->accountManagement=$accountManagement;
// }

// public function getDefaultBillingAddress()
// {
   
//     $customerId = $this->customer->getId();
//     //echo $customerId;

//     $address = $this->accountManagement->getDefaultBillingAddress($customerId);
//    return $address;

// }
// public function getDefaultShippingAddress()
// {
//     $customerId = $this->customer->getId();
//     //echo $customerId;

//     $address = $this->accountManagement->getDefaultShippingAddress($customerId);
//    return $address;

// }

// }
  //     $customer = $this->customerRepository->getById($customerId);

// foreach ($customer->getAddresses() as $address) {

//     $customeraddress['Street']=$address->getStreet();
//     $customeraddress['Telephone']=$address->getTelephone();
//     $customeraddress['PostCode']=$address->getPostcode();
//     $customeraddress['City']=$address->getCity();
//     // echo "<pre>";
//     // print_r($address->getStreet());
//     // echo "<pre>";
//     // print_r($address->getTelephone());
//     // echo "<pre>";
//     // print_r($address->getPostcode());
//     // echo "<pre>";
//     // print_r($address->getCity());
//      // print_r($address->getRegion());
// }
// // var_dump($customeraddress);

// echo "Telephone:".$customeraddress['Telephone'];
// exit;


   
//         // $addresses = $this->accountManagement->getDefaultBillingAddress($customerId);
        
//         // foreach ($addresses as $address) {
//         //     $customerAddress[] = $address->toArray();
           
//         // } 
//         // foreach ($customerAddress as $customerAddres) {
//         //     echo $customerAddres['street'];
//         // }
//         // exit;
//        // return $address;
