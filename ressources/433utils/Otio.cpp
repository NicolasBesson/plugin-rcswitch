/*

 'codesend' hacked from 'send' by @justy
 
 - The provided rc_switch 'send' command uses the form systemCode, unitCode, command
   which is not suitable for our purposes.  Instead, we call 
   send(code, length); // where length is always 24 and code is simply the code
   we find using the RF_sniffer.ino Arduino sketch.

 Usage: ./codesend decimalcode
 (Use RF_Sniffer.ino to check that RF signals are being produced by the RPi's transmitter)
 */

#include "RCSwitch.h"
#include <stdlib.h>
#include <stdio.h>
     

int main(int argc, char *argv[]) {
    
    // This pin is not the first pin on the RPi GPIO header!
    // Consult https://projects.drogon.net/raspberry-pi/wiringpi/pins/
    // for more information.
    int PIN = atoi(argv[1]);
    // Parse the firt parameter to this command as an integer
    int code = atoi(argv[2]);
    
    if (wiringPiSetup () == -1) return 1;
	printf("sending code[%i]\n", code);
	RCSwitch mySwitch = RCSwitch();
	mySwitch.enableTransmit(PIN);

    // Optional set pulse length.
       mySwitch.setPulseLength(670);
  
    // Optional set protocol (default is 1, will work for most outlets)
       mySwitch.setProtocol(2);
  
    // Optional set number of transmission repetitions.
    // mySwitch.setRepeatTransmit(15);
  
    
    mySwitch.send(code, 32);
    
	return 0;

}
