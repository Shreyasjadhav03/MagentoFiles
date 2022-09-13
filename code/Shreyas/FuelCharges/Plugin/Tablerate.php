<?php

namespace Shreyas\FuelCharges\Plugin;

class Tablerate
{

    protected $connection;
    protected $resource;

    public function __construct(
        \Magento\Framework\App\ResourceConnection $resource
    ) {
        $this->connection = $resource->getConnection();
        $this->_resource = $resource;
    }

    public function afterUploadAndImport(\Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate $object, $result)
    {
        $tableName = $this->connection->getTableName('shipping_tablerate'); //gives table name with prefix

        /**
         * @var \Magento\Framework\App\Config\Value $object
         */
        if (empty($_FILES['groups']['tmp_name']['tablerate']['fields']['import']['value'])) {
            return $this;
        }
        $filePath = $_FILES['groups']['tmp_name']['tablerate']['fields']['import']['value'];

        $openCsv = fopen($filePath, "r");

        if (!empty($openCsv)) 
        {
            $headers = fgetcsv($openCsv, 1000, ',');

            

            if (in_array('Fuel Surcharge', $headers)) 
            {
                try {
                    while (!empty($data = fgetcsv($openCsv, 1000, ','))) 
                    {
                        // echo "<pre>";
                        // print_r($data);exit;
                        $zip = $data[2];
                        $fuelCharge = $data[5];

                        try 
                        {
                            // $connection->query($sql);
                            $this->connection->update(
                                $tableName,
                                ['fuel_surcharge' => $fuelCharge],
                                ['dest_zip =?' => $zip]
                            );
                        } 
                        catch (\Magento\Framework\Exception\LocalizedException $e) 
                        {
                            $this->connection->rollBack();
                            throw new \Magento\Framework\Exception\LocalizedException(__('Unable to import data'), $e);
                        }
                    }
                } 
                catch (\Magento\Framework\Exception\LocalizedException $e) 
                {
    
                    throw new \Magento\Framework\Exception\LocalizedException(__('Unable to find Column'), $e);
            }
        } 
        else 
        {
            throw new \Magento\Framework\Exception\LocalizedException(__('File is Empty'));
        }

        fclose($openCsv);
        //$this->connection->commit();
    }
}
}

//     // protected $connection;
//     // protected $resource;

//     // public function __construct(
//     //     \Magento\Framework\App\ResourceConnection $resource
//     // ) {
//     //     $this->connection = $resource->getConnection();
//     //     $this->_resource = $resource;
//     // }

//     // public function afterUploadAndImport(\Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate $object, $result)
//     // {
//     //     $tableName = $this->connection->getTableName('shipping_tablerate'); //gives table name with prefix

//     //     /**
//     //      * @var \Magento\Framework\App\Config\Value $object
//     //      */
//     //     if (empty($_FILES['groups']['tmp_name']['tablerate']['fields']['import']['value'])) {
//     //         return $this;
//     //     }

//     //     $filePath = $_FILES['groups']['tmp_name']['tablerate']['fields']['import']['value'];

//     //     $csv_file = fopen($filePath, 'r');

//     //     if ($csv_file !== false) {

//     //         // Get headers
//     //         if (($data = fgetcsv($csv_file, 1000, ',')) !== false) {
//     //             $headers = $data;

//     //             if (in_array('Fuel Surcharge', $headers) === false) {

//     //                 throw new \Magento\Framework\Exception\LocalizedException(__('Unable to import data'));
//     //             }

//     //         }


//     //         // Get the rest
//     //         while (($data = fgetcsv($csv_file, 1000, ',')) !== false) {

//     //             $zip = $data[2];
//     //             $fuelCharge = $data[5];

//     //             try {
//     //                 // $connection->query($sql);
//     //                 $this->connection->update($tableName,
//     //                     ['fuel_surcharge' => $fuelCharge],
//     //                     ['dest_zip =?' => $zip]);

//     //             } catch (\Magento\Framework\Exception\LocalizedException $e) {
//     //                 $this->connection->rollBack();
//     //                 throw new \Magento\Framework\Exception\LocalizedException(__('Unable to import data'), $e);
//     //             } catch (\Exception $e) {
//     //                 $this->connection->rollBack();
//     //                 $this->logger->critical($e);
//     //                 throw new \Magento\Framework\Exception\LocalizedException(
//     //                     __('Something went wrong while importing table rates.')
//     //                 );
//     //             }
//     //         }
//     //         fclose($csv_file);
//     //         $this->connection->commit();

//     //     }

//     // }
// }
