using System.Reflection.Metadata;
using Microsoft.EntityFrameworkCore;

namespace SoapDotnet.Models
{
    public partial class AppDbContext(DbContextOptions<AppDbContext> options) : DbContext(options)
    {
        public virtual DbSet<User> Users { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<User>()
                            .OwnsOne(u => u.Address);
        }
    }
}