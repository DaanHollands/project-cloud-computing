import { DataTypes, Model } from 'sequelize'
import database from '../database.js'

class Message extends Model {
  public id!: number;
  public content!: string;
  public userColor!: string;
  public createdAt!: Date;
}


Message.init(
  {
    content: {
      type: DataTypes.STRING,
      allowNull: false,
    },
    userColor: {
      type: DataTypes.STRING,
      allowNull: false,
      defaultValue: '#ffffff',
    },
  },
  {
    sequelize: database,
    modelName: 'Message',
    tableName: 'messages',
    timestamps: true,
  }
)

export default Message