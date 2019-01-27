/*
  RF_Sniffer
  
  Hacked from http://code.google.com/p/rc-switch/
  
  by @justy to provide a handy RF code sniffer
*/

#include "RCSwitch.h"
#include <stdlib.h>
#include <stdio.h>
     
int received_code;
int wait_timer = 50;
int ok_code = 0;

     
RCSwitch mySwitch;
 


int main(int argc, char *argv[]) {
  
     // This pin is not the first pin on the RPi GPIO header!
     // Consult https://projects.drogon.net/raspberry-pi/wiringpi/pins/
     // for more information.
     int PIN = atoi(argv[1]);
     int compteur ;
     

     if(wiringPiSetup() == -1)
       return 0;

     mySwitch = RCSwitch();
     mySwitch.enableReceive(PIN);  // Receiver on inerrupt 0 => that is pin #2
     
     //We received GPIO State to see if something is happening
    for(int timer=0;timer < wait_timer;timer++)
    {
        received_code = digitalRead(PIN);
      if (received_code == 1) { ok_code++; } //If PIN IS HIGH add to ok_code
      //printf("%i",digitalRead(pin));
      delay(20);
  }

    if (ok_code == 0) //If the PIN was never on HIGH we assume there was a problem
    {
        printf("Aucun signal détecé\n");
        printf("Vérifier la définition des pins sur la page de config du plugin");
        exit(1);
    }
    else //If test1 PASS
    {   

    
     
for (compteur=1; compteur<900; compteur++)
{
      delay(20); 

      if (mySwitch.available()) {
    
        int value = mySwitch.getReceivedValue();
    
        if (value == 0) {
          printf("Unknown encoding\n");
        } else {    
   
	   
	   printf("Type: " );
	   printf("\n");
          printf("%i\n", mySwitch.getReceivedProtocol() );
	   printf("\n");
	   printf("Longueur: " );
	   printf("\n");
          printf("%i\n", mySwitch.getReceivedBitlength() );
	   printf("\n");
	   printf("Protocole: " );
	   printf("\n");
	   printf("Send" );
	   printf("%i\n", mySwitch.getReceivedDelay() );
	   printf("\n");
	   printf("Code: " );
	   printf("\n");
          printf("%i\n", mySwitch.getReceivedValue() );
          return 0;
}
    
    mySwitch.resetAvailable();
    
      }

      
  
  }

  
          printf("Délai dépassé");
	   printf("\n");
	   printf("Veuillez réessayer");
  	   return 0;


}
}

