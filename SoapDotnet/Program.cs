using SoapCore;
using Microsoft.EntityFrameworkCore;
using SoapDotnet.Models;


var builder = WebApplication.CreateBuilder(args);

// Add services to the container.
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

var connectionString = "Host=postgres;Port=5432;Database=user_profile_database;Username=postgres;Password=postgres;";
builder.Services.AddDbContext<AppDbContext>(options =>
    options.UseNpgsql(connectionString, npgsqlOptions => 
        npgsqlOptions.EnableRetryOnFailure()));

builder.Services.AddSoapCore();
builder.Services.AddScoped<IAuthentication, Authentication>();            

var app = builder.Build();

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

// app.UseHttpsRedirection();

app.UseSoapEndpoint<IAuthentication>("/auth", new SoapEncoderOptions());

app.Run();