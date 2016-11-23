
using NUnit.Framework;
using ProgramiEmailTest;

namespace ProgramiEmail.NUnitTest
{
    [TestFixture]

    class KlasaEmailNunit
    {
        [Test]
        public static void DergoEmailNunitTest()

        {
            var rez = KlasaEmailTe.DergoEmailTest();
            bool vlera = false;
            Assert.That(rez, Is.EqualTo(vlera));


        
        }
        
    }
}
