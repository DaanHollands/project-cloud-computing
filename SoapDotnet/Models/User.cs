using System.ComponentModel.DataAnnotations;

namespace SoapDotnet.Models
{
    public class User
    {
        [Key]
        public required string Id{get; set;}

        [Required]
        [MaxLength(100)]
        public required string Password{get; set;}

        [Required]
        [MaxLength(50)]
        public required string FirstName{get; set;}

        [Required]
        [MaxLength(50)]
        public required string LastName{get; set;}

        [Required]
        [MaxLength(50)]
        public required string Email{get; set;}

        [MaxLength(100)]
        public string? remember_token;
    }
}