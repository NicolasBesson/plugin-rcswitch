
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
    char* sFamily = argv[2];
    int nGroup = atoi(argv[3]);
    int nDevice = atoi(argv[4]);
    int command  = atoi(argv[5]);
    
    if (wiringPiSetup () == -1) return 1;
   printf("sending sFamily[%s] nGroup[%i] nDevice[%i] command[%i]\n", sFamily, nGroup, nDevice, command);
   RCSwitch mySwitch = RCSwitch();
   mySwitch.enableTransmit(PIN);
    
    switch(command) {
        case 1:
            mySwitch.switchOn(sFamily[0], nGroup, nDevice);
            break;
        case 0:
            mySwitch.switchOff(sFamily[0], nGroup, nDevice);
            break;
        default:
            printf("command[%i] is unsupported\n", command);
            return -1;
    }
   return 0;
}