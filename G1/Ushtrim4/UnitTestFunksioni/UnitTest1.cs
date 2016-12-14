using System;
using NUnit.Framework;
using ProgramiFunk;

namespace UnitTestFunksioni
{
    [TestFixture]
    public class UnitTest1
    {
        public char x;
        public char y;
        
        public char[] excpected = { 'A', 'B'};
        public char[] expected1 = { 'M', 'N', 'O', 'P', 'Q' };
        public UnitTest1 () { }
        Random rand = new Random();
        [Test]
        public void k()
        { FunksioniBaze f= new FunksioniBaze();
            int num = rand.Next(excpected.Length);
            int num2 = rand.Next(expected1.Length);
            this.x = excpected[num];
            this.y=expected1[num2];
            var l=f.Fuksioni(this.x,this.y);
          Assert.That(l,Is.EqualTo('1'));
        }
        }
    }

