using System.Runtime.InteropServices;

namespace SoapDotnet.Models
{
    public class Authentication : IAuthentication
    {

        private readonly AppDbContext _context;

        public Authentication(AppDbContext context)
        {
            _context = context;
        }

        public int Login(string email, string password)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == email && u.Password == password);

            return user?.Id ?? -1;
        }

        public UserInfo? GetUserById(int userId)
        {
            var user = _context.Users.FirstOrDefault(u => u.Id == userId);

            if (user == null)
            {
                return new UserInfo(-1, string.Empty, string.Empty, string.Empty);
            }

            return new UserInfo(user.Id, user.Email, user.FirstName + " " + user.LastName, user.remember_token ?? string.Empty);
        }

        public bool UpdateRemeberToken(int Id, string Password, string Token)
        {
            var user = _context.Users.FirstOrDefault(u => u.Id == Id && u.Password == Password);

            if(user != null)
            {
                user.remember_token = Token;
                _context.SaveChanges();
                return true;
            }
            return false;
        }

        public string GetPasswordHash(int Id)
        {
            var user = _context.Users.FirstOrDefault(u => u.Id == Id);
            return user?.Password ?? string.Empty;
        }

        public int Register(string email, string password, string name)
        {
            User user = new()
            {
                Id = 0, // Assuming Id is auto-generated and will be replaced by the database
                Email = email,
                Password = password,
                FirstName = name.Split(' ')[0],
                LastName = name.Split(' ').Length > 1 ? name.Split(' ')[1] : string.Empty
            };

            var result = _context.Users.Add(user);
            _context.SaveChanges();

            return result.Entity?.Id ?? -1;
        }

        public UserInfo? GetUserByEmail(string email)
        {
            var user = _context.Users.FirstOrDefault(u => u.Email == email);
            if(user == null)
            {
                return new UserInfo(-1, string.Empty, string.Empty, string.Empty);
            }
            return new UserInfo(user.Id, user.Email, user.FirstName + " " + user.LastName, user.remember_token ?? string.Empty);
        }

        public string GetSession(string SessionId)
        {
            var session = _context.Sessions.FirstOrDefault(s => s.SessionId == SessionId);
            if(session == null)
            {
                return string.Empty;
            }
            return session.Data;
        }

        public bool WriteSession(string SessionId, string Data)
        {
            Session session = new Session
            {
                SessionId = SessionId,
                Data = Data,
                UnixTineStamp = DateTimeOffset.UtcNow.ToUnixTimeSeconds()
            };
            var result = _context.Sessions.Add(session);
            _context.SaveChanges();

            return result != null;
        }

        public void DestroySession(string SessionId)
        {
            var session = _context.Sessions.FirstOrDefault(s => s.SessionId == SessionId);

            if(session == null)
            {
                return;
            }
            _context.Sessions.Remove(session);
            _context.SaveChanges();
        }

        public void DestroySessionsSince(int Time)
        {
            var sessions = _context.Sessions.Where(s => s.UnixTineStamp <= Time).ToList();

            foreach(var session in sessions)
            {
                _context.Sessions.Remove(session);
            }
            _context.SaveChanges();
        }
    }
}
