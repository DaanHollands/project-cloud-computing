<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: app/grpc/medicalData.proto

namespace App\grpc\GPBMetadata;

class MedicalData
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
medicalData.proto"
GetByIdRequest

id ("$
GetByUserIdRequest
userId ("f
MedicalRecordResponse

id (
title (	
userId (
doctorId (
imageUrl (	"E
MedicalRecordsListResponse\'
records (2.MedicalRecordResponse"^
InvoiceResponse

id (
title (	
userId (
imageUrl (	
isPaid (":
InvoicesListResponse"
invoices (2.InvoiceResponse2�
MedicalDataService?
GetMedicalRecordById.GetByIdRequest.MedicalRecordResponseM
GetMedicalRecordsByUserId.GetByUserIdRequest.MedicalRecordsListResponse3
GetInvoiceById.GetByIdRequest.InvoiceResponseA
GetInvoicesByUserId.GetByUserIdRequest.InvoicesListResponsebproto3'
        , true);

        static::$is_initialized = true;
    }
}

