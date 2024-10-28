namespace Models
{
    public class Service : IVoorbeldService
    {
        public string Test(string s)
        {
            Console.WriteLine("Test Method");
            return s + "" + s;
        }
    }
}