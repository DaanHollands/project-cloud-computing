import logging
import grpc
from grpc_reflection.v1alpha import reflection
from contextlib import contextmanager

import alembic.config
from concurrent import futures
from sqlalchemy.orm import Session

# import database models and connection
from database.db import init_db
from database.models import *

# import the generated classes
from proto import medicalData_pb2
from proto import medicalData_pb2_grpc


class MedicalDataServiceServicer(medicalData_pb2_grpc.MedicalDataServiceServicer):

    def __init__(self, SessionLocal: Session):
        self.SessionLocal = SessionLocal
    
    @contextmanager
    def _get_session(self):
        """Helper function to create a new session."""
        db = self.SessionLocal()
        try:
            yield db
        finally:
            db.close()
    
    def GetMedicalRecordById(self, request, context):
        print('GetMedicalRecordByID')
        with self._get_session() as session:
            record = session.query(MedicalRecord).filter(MedicalRecord.id == request.id).first()
            if record:
                return medicalData_pb2.MedicalRecordResponse(
                        id=record.id,
                        title=record.title,
                        userId=record.userid,
                        doctorId=record.doctorid,
                        imageUrl=record.imageUrl
                    )
            else:
                context.set_code(grpc.StatusCode.NOT_FOUND)
                context.set_details("Medical record not found.")
                return medicalData_pb2.MedicalRecordResponse()
    
    def GetMedicalRecordsByUserId(self, request, context):
        print('GetMedicalRecordByUserID')
        with self._get_session() as session:
            records = session.query(MedicalRecord).filter(MedicalRecord.userid == request.userId).all()
            
            if not records:
                context.set_code(grpc.StatusCode.NOT_FOUND)
                context.set_details("Records not found.")
                return medicalData_pb2.MedicalRecordsListResponse()
            
            return medicalData_pb2.MedicalRecordsListResponse(
                records=[medicalData_pb2.MedicalRecordResponse(
                            id=rec.id, 
                            title=rec.title,
                            userId=rec.userid, 
                            doctorId=rec.doctorid, 
                            imageUrl=rec.imageUrl
                        ) for rec in records])

    def GetInvoiceById(self, request, context):
        print('GetInvoiceByID')
        with self._get_session() as session:
            invoice = session.query(Invoice).filter(Invoice.id == request.id).first()
            if invoice:
                return medicalData_pb2.InvoiceResponse(
                        id=invoice.id, 
                        title=invoice.title,
                        userId=invoice.userid, 
                        imageUrl=invoice.imageUrl, 
                        isPaid=invoice.ispaid
                    )
            else:
                context.set_code(grpc.StatusCode.NOT_FOUND)
                context.set_details("Invoice not found.")
                return medicalData_pb2.InvoiceResponse()

    def GetInvoicesByUserId(self, request, context):
        print('GetInvoiceByUserID')
        with self._get_session() as session:
            invoices = session.query(Invoice).filter(Invoice.userid == request.userId).all()
            
            if not invoices:
                context.set_code(grpc.StatusCode.NOT_FOUND)
                context.set_details("Invoices not found.")
                return medicalData_pb2.InvoicesListResponse()
            
            return medicalData_pb2.InvoicesListResponse(
                invoices=[medicalData_pb2.InvoiceResponse(
                            id=inv.id,
                            title=inv.title, 
                            userId=inv.userid, 
                            imageUrl=inv.imageUrl, 
                            isPaid=inv.ispaid
                        ) for inv in invoices])


def run_migrations():
    """Run Alembic migrations programmatically."""
    logging.basicConfig(level=logging.INFO)
    print("Applying database migrations...")
    try:
        alembic_cfg = alembic.config.Config("alembic.ini")
        alembic.command.upgrade(alembic_cfg, 'head')
        print("Migrations applied successfully.")
    except Exception as e:
        print(f"Error applying migrations: {e}")


def serve():
    # run the migrations
    run_migrations()
    
    # create a database session
    alembic_cfg = alembic.config.Config("alembic.ini")
    database_url = alembic_cfg.get_main_option("sqlalchemy.url")
    engine, SessionLocal = init_db(database_url)
    
    # create a gRPC server
    server = grpc.server(futures.ThreadPoolExecutor(max_workers=10))
    medicalData_pb2_grpc.add_MedicalDataServiceServicer_to_server(MedicalDataServiceServicer(SessionLocal), server)
    
    # Enable reflection
    service_names = (
        medicalData_pb2.DESCRIPTOR.services_by_name['MedicalDataService'].full_name,
        reflection.SERVICE_NAME,
    )
    reflection.enable_server_reflection(service_names, server)
    
    # run the server on the port 50051
    server.add_insecure_port('[::]:50051')
    print("Server started. Listening on port 50051.")
    server.start()
    server.wait_for_termination()

if __name__ == '__main__':
    serve()
