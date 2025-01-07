<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: medicalData.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>MedicalRecordsListResponse</code>
 */
class MedicalRecordsListResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .MedicalRecordResponse records = 1;</code>
     */
    private $records;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\MedicalRecordResponse>|\Google\Protobuf\Internal\RepeatedField $records
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\MedicalData::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .MedicalRecordResponse records = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * Generated from protobuf field <code>repeated .MedicalRecordResponse records = 1;</code>
     * @param array<\MedicalRecordResponse>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRecords($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \MedicalRecordResponse::class);
        $this->records = $arr;

        return $this;
    }

}

