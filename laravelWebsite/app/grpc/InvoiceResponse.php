<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: medicalData.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Invoice
 *
 * Generated from protobuf message <code>InvoiceResponse</code>
 */
class InvoiceResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     */
    protected $id = 0;
    /**
     * Generated from protobuf field <code>string title = 2;</code>
     */
    protected $title = '';
    /**
     * Generated from protobuf field <code>int64 userId = 3;</code>
     */
    protected $userId = 0;
    /**
     * Generated from protobuf field <code>string imageUrl = 4;</code>
     */
    protected $imageUrl = '';
    /**
     * Generated from protobuf field <code>bool isPaid = 5;</code>
     */
    protected $isPaid = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $id
     *     @type string $title
     *     @type int|string $userId
     *     @type string $imageUrl
     *     @type bool $isPaid
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MedicalData::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Generated from protobuf field <code>int64 id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkInt64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string title = 2;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Generated from protobuf field <code>string title = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 userId = 3;</code>
     * @return int|string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Generated from protobuf field <code>int64 userId = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkInt64($var);
        $this->userId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string imageUrl = 4;</code>
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Generated from protobuf field <code>string imageUrl = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setImageUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->imageUrl = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool isPaid = 5;</code>
     * @return bool
     */
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * Generated from protobuf field <code>bool isPaid = 5;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsPaid($var)
    {
        GPBUtil::checkBool($var);
        $this->isPaid = $var;

        return $this;
    }

}

