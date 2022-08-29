<?php
declare(strict_types=1);

namespace Shreyas\HelloWorld\Api;

use Shreyas\HelloWorld\Api\Data\TableInsertInterface;

interface TableInsertRepositoryInterface
{
     /**
     * Save Form Data.
     *
     * @param TableInsertInterface $table
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function save(\Shreyas\HelloWorld\Api\Data\TableInsertInterface $table);


}