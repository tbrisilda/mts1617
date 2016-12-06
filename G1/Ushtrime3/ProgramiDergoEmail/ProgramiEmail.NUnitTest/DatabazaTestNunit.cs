using NUnit.Framework;
using ProgramiEmailTest;


namespace ProgramiEmail.NUnitTest

{
    [TestFixture]

    class DatabazaTestNunit
    {
        [Test]
        public static void FutTedhenaTestNunitTest()
        {
            string db = DatabazaTest.FutTedhenaTest().ToString();
            string gl = "gabim";
            Assert.AreEqual(gl, db);

        }

    }
}
