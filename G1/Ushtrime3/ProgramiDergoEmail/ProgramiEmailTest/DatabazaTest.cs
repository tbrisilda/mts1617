using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using ProgramiDergoEmail;
using System.IO;
using System.Threading.Tasks;
using System.Net;


namespace ProgramiEmailTest
{  
    [TestClass]
   public  class DatabazaTest
    {
        [TestMethod]
        public static bool FutTedhenaTest ()
        {
            var re = KlasaEmail.DergoEmail();
            return re;
        }
    }
}
