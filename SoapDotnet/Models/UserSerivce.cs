using System.Data.SqlTypes;
using System.Runtime.InteropServices;
using Microsoft.EntityFrameworkCore;

namespace SoapDotnet.Models
{
    public class UserService : IUserService
    {

        private readonly AppDbContext _context;

        public UserService(AppDbContext context)
        {
            _context = context;
        }

        public bool CreateUser(string Email, string FullName, string BirthDay, string PostalCode, string Street, int HouseNumber, string Country)
        {
            Address address = new(PostalCode, Street, HouseNumber, Country);
            
            User user = new()
            {
                Id = 0,
                Email = Email,
                FirstName = FullName,
                LastName = FullName,
                BirthDay = BirthDay,
                Address = address
            };

            _context.Users.Add(user);
            return _context.SaveChanges() > 0;
        }

        public bool DeleteProfile(string Email)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == Email);

            if(user == null)
            {
                return false;
            }
            _context.Users.Remove(user);
            return _context.SaveChanges() > 0;
        }

        public User? GetUserByEmail(string Email)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == Email);
            return user ;
        }

        public bool SetUserPhoneNumber(string Email, string PhoneNumber)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == Email);
            
            if(user == null)
            {
                return false;
            }

            user.PhoneNumber = PhoneNumber;
            _context.Users.Update(user);
            return _context.SaveChanges() > 0;
        }

        public bool UpdateAddress(string Email, string PostalCode, string Street, int HouseNumber, string Country)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == Email);

            if(user == null)
            {
                return false;
            }

            Address address = new(PostalCode, Street, HouseNumber, Country);
            user.Address = address;

            _context.Users.Update(user);
            return _context.SaveChanges() > 0;
        }
    }
}