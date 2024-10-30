using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace SoapDotnet.Models
{
    public class User
    {
        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.Identity)]
        public required int Id{get; set;}

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