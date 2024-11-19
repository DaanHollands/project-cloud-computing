
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Runtime.Serialization;

namespace SoapDotnet.Models
{
    [DataContract]  
    public class Address(string PostalCode, string Street, int HouseNumber, string Country)
    {
        [DataMember]
        public string PostalCode { get; set; } = PostalCode;

        [DataMember]
        public string Street { get; set; } = Street;

        [DataMember]
        public int HouseNumber { get; set; } = HouseNumber;

        [DataMember]
        public string Country { get; set; } = Country;
    }
}