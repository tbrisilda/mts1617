using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using usht3;
namespace UnitTestUsht3
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void TestMethod1()
        {
            //string a = "A";
            //string b = "B";
            var a = new List<string>() { "A", "B" };
            var b = new List<string>() { "M", "N", "O", "P", "Q" };

            Random rand = new Random();

            int indexa = rand.Next(a.Count);
            int indexb = rand.Next(b.Count);

            Class1 test = new Class1();
            test.usht(a[indexa], b[indexb]);

            //["A","B"],{"M","N","O","P","Q"}
        }
    }
}