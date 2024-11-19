using System.Runtime.Versioning;
using System.ServiceModel;

namespace SoapDotnet.Models
{
    [ServiceContract]
    public interface IUserService
    {
        [OperationContract]
        public bool CreateUser(string Email, string FullName, string BirthDate, string PostalCode, string Street, int HouseNumber, string Country);

        [OperationContract]
        public bool UpdateAddress(string Email, string PostalCode, string Street, int HouseNumber, string Country);

        [OperationContract]
        public bool SetUserPhoneNumber(string Email, string PhoneNumber);

        [OperationContract]
        public User? GetUserByEmail(string Email);

        [OperationContract]
        public bool DeleteProfile(string Email);
    }
    
}