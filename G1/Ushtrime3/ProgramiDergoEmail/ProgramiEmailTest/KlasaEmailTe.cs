using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using ProgramiDergoEmail;


namespace ProgramiEmailTest
{
    [TestClass]
   public class KlasaEmailTe
    {
        [TestMethod]

        public static bool DergoEmailTest()
        {
            var rezultati = KlasaEmail.DergoEmail();
            return rezultati;
            


        }

    }
}
