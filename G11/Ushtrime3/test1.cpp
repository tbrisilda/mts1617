#include <iostream>
#include <conio.h>
#include <fstream>
#include <unistd.h>


using namespace std;

string read();
void write();
void test_create(const char*);

int cpt = 0;


int main()
{
   char answer;

   cout << "Futni te dhenat ne DB (po/jo) : ";
   
   cin >> answer;
   
   while((answer != 'p') && (answer != 'j'))
   {
      cout << "Vendosni po ose jo :";
      cin >> answer;
   }
      
   if(answer == 'j')
   {
      cout << "\nTe dhenat nuk jane hedhur !\n";
      system("PAUSE");
      return 0;
   }
   
   cout << "\nTe dhenat jane hedhur ne nje dokument te ri.\n";
   
   write();
   
   cout << "\nFund !\n";

   system("email.txt");
}



string read(int i) 
{
   string data[6];
   
   ifstream doc("email.csv");
  
   if(!doc) 
   {
      cout<<"ERROR ! Dokumenti nuk u gjend !"<<endl;
      
      system("PAUSE");
   }
   
   for(int k=0; k<6; k++)
   {
      getline(doc, data[k], ';');
   }
   
   return data[i];   
}


void write()   
{
   ofstream db;
   db.open("email.txt");
   
   test_create("D:/Detyre 3/email.txt"); 

   for (int j=0; j<6; j++)
   {
      if(j==0)
         db << "Email 1\n" << "Adresa : " << read(j) << "\n";
       
      if (j==1)
         db << "Subjekti : " << read(j) << "\n";
       
      if (j==2)
         db << "Trupi :\n" << read(j) << "\n";
         
      if (j==3)
         db << "\nEmail 2\n" << "Adresa : " << read(j) << "\n";
      
      if (j==4)
         db << "Subjekti : " << read(j) << "\n";
    
      if (j==5)
         db << "Trupi :\n" << read(j) << "\n";
   }
   
   db.close();
}



void test_create(const char *path_dok)  
{
   int rez;
   
   rez = access(path_dok, F_OK);
   
   if(rez==0)
      cout << "\nTEST : File i bazes se te dhenave nuk u krijua !" << endl;
   
   else
      cout << "\nTEST : File i bazes se te dhenave u krijua !" << endl;
}
