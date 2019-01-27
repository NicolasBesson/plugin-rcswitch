/*
 Usage: ./homeeasy <remote> <button> <command>
 Command is 0 for OFF and 1 for ON
 */

#include "RCSwitch.h"
#include <stdlib.h>
#include <stdio.h>

 



 unsigned long code;
 unsigned long device;
 unsigned int button;
 unsigned int bits = 8;
 unsigned int protocol;
 bool onoff = true;

     

int main(int argc, char *argv[]) {
    
     /*
     output PIN is hardcoded for testing purposes
     see https://projects.drogon.net/raspberry-pi/wiringpi/pins/
     for pin mapping of the raspberry pi GPIO connector
     */
    int PIN = atoi(argv[1]);
    device  = atol(argv[2]);
    button  = atoi(argv[3]);
    onoff  = atoi(argv[4]);
    
    if (wiringPiSetup () == -1) return 1;
	printf("sending device[%ld] button[%i] command[%i]\n", device, button, onoff);
	RCSwitch mySwitch = RCSwitch();
	mySwitch.setProtocol(4);
       mySwitch.setRepeatTransmit(5);
	mySwitch.enableTransmit(PIN);

	
            mySwitch.send(device, button,onoff);
            
        

    
    
    
	return 0;

}
