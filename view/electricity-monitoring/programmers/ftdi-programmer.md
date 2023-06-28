# FTDI Programmer

## Purpose

The Programmer connects the FTDI port on an emonTx, an emonTx Shield, an emonTH, an emonPi
Shield, or the Shield part of a disassembled emonPi, to the USB port of a computer. This enables the
device to be programmed or to transfer serial data in each direction between the two, for calibration or
monitoring.

## Assembly

As supplied by Future Technology Devices, the programmer comes as 5 parts: the printed circuit board
with the voltage selection jumper already fitted in the 3.3 V position, one right-angle 6-way header
socket and two 7-pin headers (pins). The two 7-pin headers are not required and can be repurposed, or
if you purchased the programmer in kit form from the OEM Shop, they will have been removed from the
packet.

If you purchased it pre-assembled, nothing more needs to be done.

Otherwise, insert the right-angled header socket from the component side and solder in position,
ensuring that it sits as low as possible on the PCB.

![FTDI_programmer.jpg][FTDI_programmer]

[FTDI_programmer]: files/FTDI_programmer.jpg "The FTDI Programmer"

## Install the Drivers

If your computer’s operating system is Linux, no drivers are needed.

If your computer’s operating system is Windows or MacOS, you need to install the FTDI drivers. The
driver you need is different from the SI Labs driver that is required for the OEM-branded Programmer
and those that were available from the OEM Shop prior to January 2021. If you have followed the
instructions in the ‘Learn’ section of the OEM website for installing the Arduino IDE, you will have
installed the drivers as part of that process. If not, the appropriate part is repeated here.

The FTDI Data Sheet for the LC231X Module has links to comprehensive information about the module
and drivers.

## Windows 10 & MacOS

Download the drivers from https://www.ftdichip.com/Drivers/VCP.htm.

If you go via the FTDI home page, click on “Drivers” in the navigation column on the left, then “VCP
Drivers” to arrive at the page in the link above.

Scroll down a little way to this table:

![FTDI_drivers.jpg][ftdi_drivers]

[ftdi_drivers]: files/FTDI_drivers.jpg "FTDI Drivers"

## Windows 10

Click on **setup executable** in the “Comments” column against “Windows”.

This will download a zip file CDM21228_Setup.zip to your usual location. It contains just one
executable file, CDM21228_Setup.exe Double-click on this (or right-click and select ‘Run as
administrator’) and allow it to install the drivers in the normal way.

[N.B. Drivers for previous Windows versions are available – check the Shop page for links to the
Programmer data sheet and Driver Installation Guide.]

Make sure you restart the Arduino IDE after installing the drivers.

## MacOS

Click on the version **2.x.x** appropriate to your machine architecture and OS version. This will download
a Disk Image (DMG) file.

The details of the installation method depends on the version of OS, full details are available in the
FTDI App.Note AN_134, available at
https://www.ftdichip.com/Support/Documents/AppNotes/AN_134_FTDI_Drivers_Installation_Guide_for_MAC_OSX.pdf).

Follow the sections for installing the **VCP** Drivers.

Make sure you restart the Arduino IDE after installing the drivers.

## Connecting the Programmer

Use a Micro USB cable to connect the programmer to your computer. Before connecting the
programmer, ensure the jumper link on the programmer is set to the 3.3 V position for the emonTx,
emonTH and emonPi Shield, or 5 V for the emonTx Shield. This sets the voltage levels on the data
lines.

On the UART connector, the GND pin is labelled on the underside.

![programmer_connections.jpg][programmer_connections]

[programmer_connections]: files/programmer_connections.jpg "Programmer Connections"

## EmonTx

Plug the programmer into the emonTx with the component side of the board facing up and the GND
connection aligned with the engraving on the panel; that is, nearest to the aerial socket on the emonTx.

![How_to_connect_the_ftdi_programmer_to_an_emonTx.jpg][programmer_emontx]

[programmer_emontx]: files/How_to_connect_the_ftdi_programmer_to_an_emonTx.jpg "Connecting the programmer to an emonTx"

## EmonTx Shield

Set the jumper to the 5 V position. Plug the programmer into the emonTx Shield with the component
side of the board facing outwards and the GND connection farthest from the jack sockets.

![How_to_connect_the_ftdi_programmer_to_an_emonTx_Shield.jpg][programmer_emontx_shield]

[programmer_emontx_shield]: files/How_to_connect_the_ftdi_programmer_to_an_emonTx_Shield.jpg "Connecting the programmer to an emonTx shield"

## EmonTH

Plug the programmer into the emonTH with the component side of the board facing outward and the
GND connection farthest from the corner.

![How_to_connect_the_ftdi_programmer_to_an_emonTH.jpg][programmer_emonth]

[programmer_emonth]: files/How_to_connect_the_ftdi_programmer_to_an_emonTH.jpg "Connecting the programmer to an emonTH"

## EmonPi Shield

Plug the programmer into the emonPi Shield with the component side of the board facing the name
“RaspberryPi Energy Monitoring”. Note that a separate 5 V USB power supply is needed to program the
Shield and for the Shield to work.

![How_to_connect_the_ftdi_programmer_to_an_emonPi_Shield.jpg][programmer_emonpi_shield]

[programmer_emonpi_shield]: files/How_to_connect_the_ftdi_programmer_to_an_emonPi_Shield.jpg "LEDs on the FTDI Programmer"

## M-Bus to UART Converter
Plug the programmer onto the header pins with the component side and the LEDs facing the M-Bus to UART converter board.

![FTDI_MBus.webp][ftdi_mbus]

[ftdi_mbus]: files/FTDI_MBus.webp "Using the FTDI programmer with the M-Bus to UART converter"

## Powering the Emon Device

While loading and testing a sketch, the programmer can provide power to the emonTx and emonTH,
using the 5 V VBUS connection.

The emonTx Shield and Arduino might draw a significant current at 5 V. If the combination requires
more than the maximum of 450 mA that the programmer can supply, then a separate power supply is
required.

The emonPi Shield does not have the appropriate connection on the FTDI connector, therefore the
normal USB 5 V d.c. power must be supplied separately.

## Finding the Computer Port

The general method is: list the ports, plug the programmer in, list the ports again and the new port that
appears is that which the programmer is connected to. Select it.

## Linux, MacOS & Windows 10

In the Arduino IDE, and before connecting the programmer, check `Tools > Port` [or `Serial Port`].
If Port is greyed out, that's OK, if not and any COM (serial) ports are listed, make a note of which ones
they are. Now connect the programmer and your module (emonTx, emonTH, etc). Go back to the main
menu and select `Tools` again. `[Serial] Port` should be available and showing a new port. Select that
port. Under MacOS, the port will possibly be called `/dev/cu.SLAB_USBtoUART`.

## Assigning the Programmer’s Port (Linux Only)

Under Linux, it is possible to assign the port that the programmer will appear on. In the directory `/etc/
udev/rules.d` create a file named `60-emonProgrammer.rules`. There needs to be one line per
device. The line for the FTDI LC231X programmer is:

```
SUBSYSTEM=="tty", ATTRS{idVendor}=="0403", ATTRS{idProduct}=="6015", SYMLINK+="FTDI_LC231X",
MODE="0666"

```
The programmer will now appear as a device: `/dev/FTDI_LC231X -> ttyUSB0`
The Wicked Devices Nanode programmer entry in the (same) file would be:

```
SUBSYSTEM=="tty", ATTRS{idVendor}=="10c4", ATTRS{idProduct}=="ea60", SYMLINK+="FTDI", MODE="0666"
```

Unfortunately, the Arduino IDE does not recognise the symlinks.

There is a Forum discussion at https://community.openenergymonitor.org/t/how-to-match-a-ttyusbxdevice-to-a-usb-serial-device/8747.

## LED Activity

The programmer has two LEDs that indicate activity on the Tx and Rx data lines. Unlike other types,
there is no ‘power on’ indication.
The green LED lights to indicate data flowing from the programmer to the Emon device, the red LED
lights to indicate data being sent from the Emon device to the computer.

![FTDI_programmer_LED.png][programmer_led]

[programmer_led]: files/FTDI_programmer_LED.png "LEDs on the FTDI Programmer"

## Programming

If the Emon device is not connected, or the connection is wrong, the green LED flashes 3 times, there is
a short pause, the green LED flashes once and the familiar message “avrdude: stk500_recv():
programmer is not responding…” is printed to the monitor. The pattern of one flash, and the message,
is repeated 8 more times, then the final message and it aborts.
If the Emon device is connected, then as communication is established there is a green followed by a red
flash, then while the sketch is being loaded, both red and green LEDs appear to be lit continuously.

## Monitoring

Each time data is sent from the computer to the device, the green LED flashes, and when the Emon
device responds, the red LED flashes. If the sketch sends data every 10 s (say) then the red LED will
flash every 10 s as that data is sent.
