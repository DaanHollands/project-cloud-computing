using System.ServiceModel;

namespace Models
{
    [ServiceContract]
    public interface IVoorbeldService
    {
        [OperationContract]
        string Test(string s);
    }
}