all: arc phenix typeD typeB typeA codesend RFSniffer homeeasy brennen Send blyss HEreceive Otio Mcz Binary

arc: RCSwitch.o arc.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

homeeasy: RCSwitch.o homeeasy.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

brennen: RCSwitch.o brennen.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

phenix: RCSwitch.o phenix.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi
	
typeD: RCSwitch.o typeD.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

typeA: RCSwitch.o typeA.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

typeB: RCSwitch.o typeB.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi
	
codesend: RCSwitch.o codesend.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

Send: RCSwitch.o Send.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi
Binary: RCSwitch.o Binary.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

blyss: BlyssController.o blyss.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi
	
RFSniffer: RCSwitch.o RFSniffer.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

HEreceive: HEreceive.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

Otio: RCSwitch.o Otio.o
	$(CXX) $(CXXFLAGS) $(LDFLAGS) $+ -o $@ -lwiringPi

Mcz : Mcz.o manchester.o
	gcc -o $@ $^ -lwiringPi

Mcz.o : Mcz.c
	gcc -c $< -o $@

%.o : %.c %.h
	gcc -c -std=c99 $< -o $@ | gcc -c -std=c99 $< -o $@



clean:
	$(RM) *.o arc phenix typeD typeB typeA codesend servo RFSniffer homeeasy HEreceive brennen Send blyss Otio Mcz Binary
