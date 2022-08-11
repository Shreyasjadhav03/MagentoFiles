<?php declare(strict_types=1);

namespace Shreyas\HelloWorld\Api\Data;

use \Magento\Framework\Api\ExtensibleDataInterface;

interface TableInsertInterface extends ExtensibleDataInterface
{
    const ID ='id';
    const NAME ='name';
    const EMAIL ='email';
    const TELEPHONE ='telephone';
    const CREATED_AT ='created_at';
    
    /**
     * Get id
     * @return string|null
     */

    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */

    public function setId($id);

    /**
     * Get name
     * @return string|null
     */

    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */

    public function setName($name);

    /**
     * Get email
     * @return string|null
     */

    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */

    public function setEmail($email);

    /**
     * Get telephone
     * @return string|null
     */

    public function getTelephone();

    /**
     * Set telephone
     * @param string $telephone
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */

    public function setTelephone($telephone);

    /**
     * Get created_at
     * @return string|null
     */

    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */

    public function setCreatedAt($createdAt);

}