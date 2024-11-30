from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker, scoped_session



def init_db(database_url: str):
    engine = create_engine(database_url, echo=True)  # `echo=True` for debugging SQL queries
    SessionLocal = scoped_session(sessionmaker(autocommit=False, autoflush=False, bind=engine))
    return engine, SessionLocal
