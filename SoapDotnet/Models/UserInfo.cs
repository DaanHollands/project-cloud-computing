using System.Runtime.Serialization;

namespace SoapDotnet.Models
{  
    [DataContract]
    public class UserInfo
    {
        [DataMember]
        public int UserId { get; set; }
        [DataMember]
        public string Email { get; set; }
        [DataMember]
        public string FullName { get; set; }
        [DataMember]
        public string Token { get; set; }

        public UserInfo()
        {
            Email = string.Empty;
            FullName = string.Empty;
            Token = string.Empty;
        }

        public UserInfo(int userId, string email, string fullName, string token)
        {
            UserId = userId;
            Email = email;
            FullName = fullName;
            Token = token;
        }
    }
}