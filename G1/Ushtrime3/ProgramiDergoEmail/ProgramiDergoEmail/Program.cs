using System;
using System.IO;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net.Mail;
using System.Net;
using System.ComponentModel;
using System.Threading.Tasks;

namespace ProgramiDergoEmail
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine(KlasaEmail.DergoEmail());

            Console.ReadKey();

        }
    }
}
