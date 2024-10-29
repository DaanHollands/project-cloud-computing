
using Microsoft.EntityFrameworkCore;

namespace SoapDotnet.Models
{
    public class Authentication : IAuthentication
    {

        private readonly AppDbContext _context;

        public Authentication(AppDbContext context)
        {
            _context = context;
        }
        public bool Login(string email, string password)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == email && u.Password == password);

            return user != null;
        }
    }
}