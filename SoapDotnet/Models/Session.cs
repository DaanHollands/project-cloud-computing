using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace SoapDotnet.Models
{
    public class Session
    {
        [Key]
        public required string Id {get; set;}

        public required int UserId {get; set;}

        [ForeignKey("UserId")]
        public User? User {get; set;}

        public string? IpAddress {get; set;}

        public string? UserAgent {get; set;}

        public required string LongText {get; set;}

        public int LastActivity {get; set;}
    }

}
