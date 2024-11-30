# -*- coding: utf-8 -*-
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# NO CHECKED-IN PROTOBUF GENCODE
# source: proto/medicalData.proto
# Protobuf Python Version: 5.28.1
"""Generated protocol buffer code."""
from google.protobuf import descriptor as _descriptor
from google.protobuf import descriptor_pool as _descriptor_pool
from google.protobuf import runtime_version as _runtime_version
from google.protobuf import symbol_database as _symbol_database
from google.protobuf.internal import builder as _builder
_runtime_version.ValidateProtobufRuntimeVersion(
    _runtime_version.Domain.PUBLIC,
    5,
    28,
    1,
    '',
    'proto/medicalData.proto'
)
# @@protoc_insertion_point(imports)

_sym_db = _symbol_database.Default()




DESCRIPTOR = _descriptor_pool.Default().AddSerializedFile(b'\n\x17proto/medicalData.proto\"\x1c\n\x0eGetByIdRequest\x12\n\n\x02id\x18\x01 \x01(\x03\"$\n\x12GetByUserIdRequest\x12\x0e\n\x06userId\x18\x01 \x01(\x03\"f\n\x15MedicalRecordResponse\x12\n\n\x02id\x18\x01 \x01(\x03\x12\r\n\x05title\x18\x02 \x01(\t\x12\x0e\n\x06userId\x18\x03 \x01(\x03\x12\x10\n\x08\x64octorId\x18\x04 \x01(\x03\x12\x10\n\x08imageUrl\x18\x05 \x01(\t\"E\n\x1aMedicalRecordsListResponse\x12\'\n\x07records\x18\x01 \x03(\x0b\x32\x16.MedicalRecordResponse\"^\n\x0fInvoiceResponse\x12\n\n\x02id\x18\x01 \x01(\x03\x12\r\n\x05title\x18\x02 \x01(\t\x12\x0e\n\x06userId\x18\x03 \x01(\x03\x12\x10\n\x08imageUrl\x18\x04 \x01(\t\x12\x0e\n\x06isPaid\x18\x05 \x01(\x08\":\n\x14InvoicesListResponse\x12\"\n\x08invoices\x18\x01 \x03(\x0b\x32\x10.InvoiceResponse2\x9c\x02\n\x12MedicalDataService\x12?\n\x14GetMedicalRecordById\x12\x0f.GetByIdRequest\x1a\x16.MedicalRecordResponse\x12M\n\x19GetMedicalRecordsByUserId\x12\x13.GetByUserIdRequest\x1a\x1b.MedicalRecordsListResponse\x12\x33\n\x0eGetInvoiceById\x12\x0f.GetByIdRequest\x1a\x10.InvoiceResponse\x12\x41\n\x13GetInvoicesByUserId\x12\x13.GetByUserIdRequest\x1a\x15.InvoicesListResponseb\x06proto3')

_globals = globals()
_builder.BuildMessageAndEnumDescriptors(DESCRIPTOR, _globals)
_builder.BuildTopDescriptorsAndMessages(DESCRIPTOR, 'proto.medicalData_pb2', _globals)
if not _descriptor._USE_C_DESCRIPTORS:
  DESCRIPTOR._loaded_options = None
  _globals['_GETBYIDREQUEST']._serialized_start=27
  _globals['_GETBYIDREQUEST']._serialized_end=55
  _globals['_GETBYUSERIDREQUEST']._serialized_start=57
  _globals['_GETBYUSERIDREQUEST']._serialized_end=93
  _globals['_MEDICALRECORDRESPONSE']._serialized_start=95
  _globals['_MEDICALRECORDRESPONSE']._serialized_end=197
  _globals['_MEDICALRECORDSLISTRESPONSE']._serialized_start=199
  _globals['_MEDICALRECORDSLISTRESPONSE']._serialized_end=268
  _globals['_INVOICERESPONSE']._serialized_start=270
  _globals['_INVOICERESPONSE']._serialized_end=364
  _globals['_INVOICESLISTRESPONSE']._serialized_start=366
  _globals['_INVOICESLISTRESPONSE']._serialized_end=424
  _globals['_MEDICALDATASERVICE']._serialized_start=427
  _globals['_MEDICALDATASERVICE']._serialized_end=711
# @@protoc_insertion_point(module_scope)