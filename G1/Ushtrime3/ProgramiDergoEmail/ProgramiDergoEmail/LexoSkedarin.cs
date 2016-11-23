using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Threading.Tasks;

namespace ProgramiDergoEmail
{
   public class LexoSkedarin
    {
        public static List<string> values = new List<string>();
        public static string line;
        public static string mesazh;

        public static string LexoAdresen()
        {
            var reader = new StreamReader(File.OpenRead(@"D:\shembull1.csv"));
            line = reader.ReadLine();
            values.Add(line.Split(',')[0]);
            return values[0];
        }
        public static string LexoSubjektin()
    {
        var reader = new StreamReader(File.OpenRead(@"D:\shembull1.csv"));

        line = reader.ReadLine();
        values.Add(line.Split(',')[1]);
        return values[1];

    }

    public static string LexoTrupin()
    {
        var reader = new StreamReader(File.OpenRead(@"D:\shembull1.csv"));

        line = reader.ReadLine();
        values.Add(line.Split(',')[2]);
        return values[2];
    
    }

    public static string Gjendja(string s)
    {

        mesazh = s;
        return mesazh;
    }
}

}


