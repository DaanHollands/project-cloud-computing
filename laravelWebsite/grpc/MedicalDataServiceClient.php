<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc;

/**
 */
class MedicalDataServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Medical Records
     * @param \GetByIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetMedicalRecordById(\GetByIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MedicalDataService/GetMedicalRecordById',
        $argument,
        ['\MedicalRecordResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \GetByUserIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetMedicalRecordsByUserId(\GetByUserIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MedicalDataService/GetMedicalRecordsByUserId',
        $argument,
        ['\MedicalRecordsListResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Invoices
     * @param \GetByIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetInvoiceById(\GetByIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MedicalDataService/GetInvoiceById',
        $argument,
        ['\InvoiceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \GetByUserIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetInvoicesByUserId(\GetByUserIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/MedicalDataService/GetInvoicesByUserId',
        $argument,
        ['\InvoicesListResponse', 'decode'],
        $metadata, $options);
    }

}
