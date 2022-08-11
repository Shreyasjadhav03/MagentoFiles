<?php
declare(strict_types=1);

namespace Shreyas\HelloWorld\Model;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class TableInsert extends AbstractExtensibleModel implements TableInsertInterface
{
    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->get(self::ID);
    }
 
    /**
     * Set id
     * @param string $id
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->get(self::NAME);
    }
 
    /**
     * Set name
     * @param string $name
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->get(self::EMAIL);
    }
 
    /**
     * Set email
     * @param string $email
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */
    public function setEmail($email)
    {
        return $this->setEmail(self::EMAIL, $email);
    }

    /**
     * Get telephone
     * @return string|null
     */
    public function getTelephone()
    {
        return $this->get(self::TELEPHONE);
    }
 
    /**
     * Set telephone
     * @param string $telephone
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->get(self::CREATED_AT);
    }
 
    /**
     * Set created_at
     * @param string $createdAt
     * @return \Shreyas\HelloWorld\Api\Data\TableInsertInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
    protected function _construct()
    {
        $this-> _init(ResourceModel\TableInsert::class);
    }
}