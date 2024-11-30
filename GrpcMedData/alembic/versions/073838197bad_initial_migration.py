"""Initial Migration

Revision ID: 073838197bad
Revises: 
Create Date: 2024-11-30 23:30:32.513572

"""
from typing import Sequence, Union

from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision: str = '073838197bad'
down_revision: Union[str, None] = None
branch_labels: Union[str, Sequence[str], None] = None
depends_on: Union[str, Sequence[str], None] = None


def upgrade() -> None:
    # ### commands auto generated by Alembic - please adjust! ###
    op.create_table('invoices',
    sa.Column('id', sa.Integer(), primary_key=True),
    sa.Column('title', sa.String(), nullable=False),
    sa.Column('userid', sa.Integer(), nullable=False),
    sa.Column('imageUrl', sa.String(), nullable=False),
    sa.Column('ispaid', sa.Boolean(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_table('medical_records',
    sa.Column('id', sa.Integer(), primary_key=True),
    sa.Column('title', sa.String(), nullable=False),
    sa.Column('userid', sa.Integer(), nullable=False),
    sa.Column('doctorid', sa.Integer(), nullable=False),
    sa.Column('imageUrl', sa.String(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    # ### end Alembic commands ###


def downgrade() -> None:
    # ### commands auto generated by Alembic - please adjust! ###
    op.drop_table('medical_records')
    op.drop_table('invoices')
    # ### end Alembic commands ###