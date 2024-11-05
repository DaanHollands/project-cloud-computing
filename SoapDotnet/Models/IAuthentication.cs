using System.ServiceModel;

namespace SoapDotnet.Models
{
    [ServiceContract]
    public interface IAuthentication
    {
        [OperationContract]
        int Login(string email, string password);

        [OperationContract]
        UserInfo? GetUserByEmail(string email);

        [OperationContract]
        UserInfo? GetUserById(int Id);

        [OperationContract]
        bool UpdateRemeberToken(int Id, string Password, string Token);

        [OperationContract]
        string GetPasswordHash(int Id);

        [OperationContract]
        int Register(string email, string password, string name);
    }
    
}