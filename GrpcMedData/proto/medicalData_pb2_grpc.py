# Generated by the gRPC Python protocol compiler plugin. DO NOT EDIT!
"""Client and server classes corresponding to protobuf-defined services."""
import grpc
import warnings

from proto import medicalData_pb2 as proto_dot_medicalData__pb2

GRPC_GENERATED_VERSION = '1.68.0'
GRPC_VERSION = grpc.__version__
_version_not_supported = False

try:
    from grpc._utilities import first_version_is_lower
    _version_not_supported = first_version_is_lower(GRPC_VERSION, GRPC_GENERATED_VERSION)
except ImportError:
    _version_not_supported = True

if _version_not_supported:
    raise RuntimeError(
        f'The grpc package installed is at version {GRPC_VERSION},'
        + f' but the generated code in proto/medicalData_pb2_grpc.py depends on'
        + f' grpcio>={GRPC_GENERATED_VERSION}.'
        + f' Please upgrade your grpc module to grpcio>={GRPC_GENERATED_VERSION}'
        + f' or downgrade your generated code using grpcio-tools<={GRPC_VERSION}.'
    )


class MedicalDataServiceStub(object):
    """Missing associated documentation comment in .proto file."""

    def __init__(self, channel):
        """Constructor.

        Args:
            channel: A grpc.Channel.
        """
        self.GetMedicalRecordById = channel.unary_unary(
                '/MedicalDataService/GetMedicalRecordById',
                request_serializer=proto_dot_medicalData__pb2.GetByIdRequest.SerializeToString,
                response_deserializer=proto_dot_medicalData__pb2.MedicalRecordResponse.FromString,
                _registered_method=True)
        self.GetMedicalRecordsByUserId = channel.unary_unary(
                '/MedicalDataService/GetMedicalRecordsByUserId',
                request_serializer=proto_dot_medicalData__pb2.GetByUserIdRequest.SerializeToString,
                response_deserializer=proto_dot_medicalData__pb2.MedicalRecordsListResponse.FromString,
                _registered_method=True)
        self.GetInvoiceById = channel.unary_unary(
                '/MedicalDataService/GetInvoiceById',
                request_serializer=proto_dot_medicalData__pb2.GetByIdRequest.SerializeToString,
                response_deserializer=proto_dot_medicalData__pb2.InvoiceResponse.FromString,
                _registered_method=True)
        self.GetInvoicesByUserId = channel.unary_unary(
                '/MedicalDataService/GetInvoicesByUserId',
                request_serializer=proto_dot_medicalData__pb2.GetByUserIdRequest.SerializeToString,
                response_deserializer=proto_dot_medicalData__pb2.InvoicesListResponse.FromString,
                _registered_method=True)


class MedicalDataServiceServicer(object):
    """Missing associated documentation comment in .proto file."""

    def GetMedicalRecordById(self, request, context):
        """Medical Records
        """
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def GetMedicalRecordsByUserId(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def GetInvoiceById(self, request, context):
        """Invoices
        """
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')

    def GetInvoicesByUserId(self, request, context):
        """Missing associated documentation comment in .proto file."""
        context.set_code(grpc.StatusCode.UNIMPLEMENTED)
        context.set_details('Method not implemented!')
        raise NotImplementedError('Method not implemented!')


def add_MedicalDataServiceServicer_to_server(servicer, server):
    rpc_method_handlers = {
            'GetMedicalRecordById': grpc.unary_unary_rpc_method_handler(
                    servicer.GetMedicalRecordById,
                    request_deserializer=proto_dot_medicalData__pb2.GetByIdRequest.FromString,
                    response_serializer=proto_dot_medicalData__pb2.MedicalRecordResponse.SerializeToString,
            ),
            'GetMedicalRecordsByUserId': grpc.unary_unary_rpc_method_handler(
                    servicer.GetMedicalRecordsByUserId,
                    request_deserializer=proto_dot_medicalData__pb2.GetByUserIdRequest.FromString,
                    response_serializer=proto_dot_medicalData__pb2.MedicalRecordsListResponse.SerializeToString,
            ),
            'GetInvoiceById': grpc.unary_unary_rpc_method_handler(
                    servicer.GetInvoiceById,
                    request_deserializer=proto_dot_medicalData__pb2.GetByIdRequest.FromString,
                    response_serializer=proto_dot_medicalData__pb2.InvoiceResponse.SerializeToString,
            ),
            'GetInvoicesByUserId': grpc.unary_unary_rpc_method_handler(
                    servicer.GetInvoicesByUserId,
                    request_deserializer=proto_dot_medicalData__pb2.GetByUserIdRequest.FromString,
                    response_serializer=proto_dot_medicalData__pb2.InvoicesListResponse.SerializeToString,
            ),
    }
    generic_handler = grpc.method_handlers_generic_handler(
            'MedicalDataService', rpc_method_handlers)
    server.add_generic_rpc_handlers((generic_handler,))
    server.add_registered_method_handlers('MedicalDataService', rpc_method_handlers)


 # This class is part of an EXPERIMENTAL API.
class MedicalDataService(object):
    """Missing associated documentation comment in .proto file."""

    @staticmethod
    def GetMedicalRecordById(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(
            request,
            target,
            '/MedicalDataService/GetMedicalRecordById',
            proto_dot_medicalData__pb2.GetByIdRequest.SerializeToString,
            proto_dot_medicalData__pb2.MedicalRecordResponse.FromString,
            options,
            channel_credentials,
            insecure,
            call_credentials,
            compression,
            wait_for_ready,
            timeout,
            metadata,
            _registered_method=True)

    @staticmethod
    def GetMedicalRecordsByUserId(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(
            request,
            target,
            '/MedicalDataService/GetMedicalRecordsByUserId',
            proto_dot_medicalData__pb2.GetByUserIdRequest.SerializeToString,
            proto_dot_medicalData__pb2.MedicalRecordsListResponse.FromString,
            options,
            channel_credentials,
            insecure,
            call_credentials,
            compression,
            wait_for_ready,
            timeout,
            metadata,
            _registered_method=True)

    @staticmethod
    def GetInvoiceById(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(
            request,
            target,
            '/MedicalDataService/GetInvoiceById',
            proto_dot_medicalData__pb2.GetByIdRequest.SerializeToString,
            proto_dot_medicalData__pb2.InvoiceResponse.FromString,
            options,
            channel_credentials,
            insecure,
            call_credentials,
            compression,
            wait_for_ready,
            timeout,
            metadata,
            _registered_method=True)

    @staticmethod
    def GetInvoicesByUserId(request,
            target,
            options=(),
            channel_credentials=None,
            call_credentials=None,
            insecure=False,
            compression=None,
            wait_for_ready=None,
            timeout=None,
            metadata=None):
        return grpc.experimental.unary_unary(
            request,
            target,
            '/MedicalDataService/GetInvoicesByUserId',
            proto_dot_medicalData__pb2.GetByUserIdRequest.SerializeToString,
            proto_dot_medicalData__pb2.InvoicesListResponse.FromString,
            options,
            channel_credentials,
            insecure,
            call_credentials,
            compression,
            wait_for_ready,
            timeout,
            metadata,
            _registered_method=True)
