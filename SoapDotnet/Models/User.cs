using System.ComponentModel.DataAnnotations;

namespace SoapCore.Models
{
    public class User
    {
        [Key]
        public int UserID{get; set;}
        [Required]
        [MaxLength(50)]
        public required string FirstName{get; set;}
        [Required]
        [MaxLength(50)]
        public required string LastName{get; set;}
        [Required]
        [MaxLength(50)]
        public required string Email{get; set;}
    }
}