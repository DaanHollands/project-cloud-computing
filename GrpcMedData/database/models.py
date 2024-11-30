from sqlalchemy import Column, Integer, String, Boolean
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()

class MedicalRecord(Base):
    __tablename__ = 'medical_records'

    id = Column(Integer, primary_key=True)
    title = Column(String, nullable=False)
    userid = Column(Integer, nullable=False)
    doctorid = Column(Integer, nullable=False)
    imageUrl = Column(String, nullable=False)
    
class Invoice(Base):
    __tablename__ = 'invoices'

    id = Column(Integer, primary_key=True)
    title = Column(String, nullable=False)
    userid = Column(Integer, nullable=False)
    imageUrl = Column(String, nullable=False)
    ispaid = Column(Boolean, nullable=False)