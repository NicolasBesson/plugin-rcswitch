

#include "RCSwitch.h"
#include <stdlib.h>
#include <stdio.h>

int main(int argc, char *argv[]) {
    
    /*
     output PIN is hardcoded for testing purposes
     see https://projects.drogon.net/raspberry-pi/wiringpi/pins/
     for pin mapping of the raspberry pi GPIO connector
     */
    int PIN = atoi(argv[1]);
    int nAddressCode = atoi(argv[2]);
    int nChannelCode = atoi(argv[3]);
    int command  = atoi(argv[4]);
    
    if (wiringPiSetup () == -1) return 1;
	printf("sending nAddressCode[%i] nChannelCode[%i] command[%i]\n", nAddressCode, nChannelCode, command);
	RCSwitch mySwitch = RCSwitch();
	mySwitch.enableTransmit(PIN);
    
    switch(command) {
        case 1:
            mySwitch.switchOn(nAddressCode, nChannelCode);
            break;
        case 0:
            mySwitch.switchOff(nAddressCode, nChannelCode);
            break;
        default:
            printf("command[%i] is unsupported\n", command);
            return -1;
    }
	return 0;
}