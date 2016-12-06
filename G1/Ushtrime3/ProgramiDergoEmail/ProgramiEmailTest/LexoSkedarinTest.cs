using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using ProgramiDergoEmail;
using System.IO;
using System.Threading.Tasks;


namespace ProgramiEmailTest
{
    [TestClass]
   public  class LexoSkedarinTest
    {
        [TestMethod]
        public static string DuhetKthejeAdresen()
        { 
            var rezultati = LexoSkedarin.LexoAdresen();
            
            return rezultati;
        }
        [TestMethod]
        public static string DuhetKthejeSubjektin()
        {
            var rezultati = LexoSkedarin.LexoSubjektin();
            
            return rezultati;
        }
        [TestMethod]
        public static string DuhetKthejeTrupin()
        {
            var rezultati = LexoSkedarin.LexoTrupin();
            
            return rezultati;
        }

       

    }
}
