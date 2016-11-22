
using NUnit.Framework;
using ProgramiEmailTest;

namespace ProgramiEmail.NUnitTest
{
    [TestFixture]

    class LexoSkedarNunit
    {
        [Test]
        public void DuhetKthejeAdresenNunit()
        {
            var rezultati = LexoSkedarinTest.DuhetKthejeAdresen();
            var vlera = "";
            Assert.That(rezultati, Is.EqualTo(vlera));
        }
        [Test]
        public void DuhetKthejeSubjektinNunit()
        {
            var rezultati = LexoSkedarinTest.DuhetKthejeSubjektin();
            var vlera = "last";
            Assert.AreNotSame(vlera, rezultati);
            
        }
        [Test]
        public void DuhetKthejeTrupiNunit()
        {
            var rezultati = LexoSkedarinTest.DuhetKthejeTrupin();
            var vlera = "dorzimdetyre";
            Assert.That(rezultati, Is.EqualTo(vlera));

        }
   

    }
}
