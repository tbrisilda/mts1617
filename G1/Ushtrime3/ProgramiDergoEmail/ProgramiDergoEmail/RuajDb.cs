using System;
using System.IO;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net;
using System.Data;
using System.ComponentModel;
using System.Data.SqlClient;
using System.Threading.Tasks;

namespace ProgramiDergoEmail
{
   public class RuajDb
    {
        public static SqlConnection con;
        public static SqlCommand cmd;
        public static string mesazh;

        public void Ruaj()
        {


            con = new SqlConnection(@"Data Source=localhost;Initial Catalog=shembull;Integrated Security=True");
            con.Open();
            cmd = new SqlCommand("insert into  [dbo].[email] (adresa,subjekti,trupi,gjendja) values(@adresa,@subjekti,@trupi,@gjendja)", con);
            cmd.Parameters.AddWithValue("@adresa",LexoSkedarin.LexoAdresen());
            cmd.Parameters.AddWithValue("@subjekti", LexoSkedarin.LexoSubjektin());
            cmd.Parameters.AddWithValue("@trupi", LexoSkedarin.LexoTrupin());
        
        }

        public static string Gjendja(string s)
        {
            mesazh = s;
            return mesazh;

        }


    }
}
