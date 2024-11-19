using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Runtime.Serialization;

namespace SoapDotnet.Models
{
    [DataContract]
    public class User
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public required int Id{ get; set; }

        [Required]
        [DataMember]
        public required string Email{ get; set; }

        [Required]
        [DataMember]
        public required string FirstName{ get; set; }

        [Required]
        [DataMember]
        public required string LastName{ get; set; }

        [Required]
        [DataMember]
        public required string BirthDay{ get; set; }

        [DataMember]
        public required Address Address{ get; set; }

        [DataMember]
        public string? PhoneNumber{ get; set; }
    }
}