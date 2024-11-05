using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace SoapDotnet.Models
{
    public class Session
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public required string SessionId{get; set;}

        [Required]
        public required string Data{get; set;}

        [Required]
        public required long UnixTineStamp{ get; set; }

    }
}