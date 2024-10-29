using System.ServiceModel;

namespace SoapDotnet.Models
{
    [ServiceContract]
    public interface IAuthentication
    {
        [OperationContract]
        bool Login(string email, string password);
    }
}