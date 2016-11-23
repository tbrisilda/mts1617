using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net.Mail;

using System.ComponentModel;

using System.Threading.Tasks;

namespace ProgramiDergoEmail


{
    
    public class KlasaEmail
        
    { 

       
        public static bool DergoEmail()
        {
            MailMessage mail = new MailMessage();
            SmtpClient client = new SmtpClient();
            client.Port = 587;
            client.DeliveryMethod = System.Net.Mail.SmtpDeliveryMethod.Network;
            client.UseDefaultCredentials = false;
            client.Host = "smtp.gmail.com";
            client.EnableSsl = true;
            client.Credentials = new System.Net.NetworkCredential("hasa.indrit@gmail.com", "en!!9940808");
            client.Timeout = 10000;
            mail.From = new MailAddress("hasa.indrit@gmail.com");
            mail.To.Add(new MailAddress(LexoSkedarin.LexoAdresen()));
            mail.Subject = LexoSkedarin.LexoSubjektin();
            mail.Body = LexoSkedarin.LexoTrupin();
            RuajDb r = new RuajDb();
            
            try
            {
                client.Send(mail);
                r.Ruaj();
                RuajDb.cmd.Parameters.AddWithValue("@gjendja", RuajDb.Gjendja("Me sukses"));
                RuajDb.cmd.ExecuteNonQuery();
                return true;
            }
            catch (Exception )
            {
                r.Ruaj();
                RuajDb.cmd.Parameters.AddWithValue("@gjendja", RuajDb.Gjendja("Gabim"));
                RuajDb.cmd.ExecuteNonQuery();

                return false;
            }

          
        }
    }
}
