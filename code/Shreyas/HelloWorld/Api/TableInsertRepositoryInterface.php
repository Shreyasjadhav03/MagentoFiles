<?php
declare(strict_types=1);

namespace Shreyas\HelloWorld\Api;

interface TableInsertRepositoryInterface
{
     /**
     * Save Form Data.
     *
     * @param \Shreyas\HelloWorld\Api\Data\TableInsertInterface $table
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */

    public function save(\Shreyas\HelloWorld\Api\Data\TableInsertInterface $table);


}