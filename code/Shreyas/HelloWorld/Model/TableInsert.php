<?php
declare(strict_types=1);

namespace Shreyas\HelloWorld\Model;
use Shreyas\HelloWorld\Api\Data\TableInsertInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class TableInsert extends AbstractExtensibleModel implements TableInsertInterface
{
    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }
 
    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return parent::getData(self::NAME);
    }
 
   /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

   /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return parent::getData(self::EMAIL);
    }
 
    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setEmail(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getTelephone()
    {
        return parent::getData(self::TELEPHONE);
    }
 
   /**
     * @inheritDoc
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::TELEPHONE, $telephone);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return parent::getData(self::CREATED_AT);
    }
 
    /**
     * @inheritDoc
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