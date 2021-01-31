## Wicked Device / OpenEnergyMonitor Programmer
(Using the Silicon Labs CP2102 USB-to-UART bridge controller)

---

#### Purpose

The Programmer connects the FTDI port on an emonTx, an emonTx Shield, an emonTH, an emonPi Shield, or the
Shield part of a disassembled emonPi to the USB port of a computer. This enables the device to be programmed or
the transfer serial data in each direction between the two, for calibration or monitoring. The programmer sold in the
OEM Shop prior to January 2021 uses the Silicon Labs chipset, which requires a driver downloaded from the SI
Labs website.

A "Wicked Device Nanode"and an OpenEnergyMonitorprogrammer.
The only practical difference is the USB connector – aUSB-Aon the Nanode programmer and aUSB-Miniconnectoron the
OpenEnergyMonitor programmer.
Installthedrivers
If your computer’s operating system is Linux, no drivers are needed.
If your computer’s operating system is Windows or MacOS, you need to install theSI Labs driversfor the CP2102
USB-to-UART bridge controller.
Windows 10 OS
Do not follow the instructions for installing the drivers on the Arduino website, instead download the drivers from
https://www.silabs.com/developers/usb-to-uart-bridge-vcp-drivers. Click "Downloads", then "CP210x
Universal Windows Driver"

This will download a zip file <code>CP210x_Universal_Windows_Driver.zip</code> to your usual location.
[Copy exactly the remainder of the old page, from "Extract the
contents ..." up but not including "If you have a favourite text editor, ..." as follows:]
Extract the contents to a convenient place and you will find two installers, one for 32-bit computers
(<code>CP210xVCPInstaller_x86.exe</code>) and one for 64-bit (<code>CP210xVCPInstaller_x64.exe</code>). Double-click
on the correct one for your machine and allow it to install the drivers in the normal way.</p>

<p>Make sure you restart the Arduino IDE after installing the drivers. Before you connect the
programmer, check <code>Tools &gt; Port</code> [or <code>Serial Port</code>]. If <code>Port</code> is greyed out, that's OK, if not and any
<code>COM</code> (serial) ports are listed, make a note of which they are. Now connect the programmer and
your module (emonTx, emonTH, etc). Go back to the main menu and select <code>Tools</code> again. [Serial]
<code>Port</code> should be available and showing a new port. Select that port. Under <code>Tools &gt; Board</code> ensure
<code>Arduino/Genuino Uno</code> is selected.</p>

MacOS
Do not follow the instructions for installing the drivers on the Arduino website, instead download the drivers from
https://www.silabs.com/developers/usb-to-uart-bridge-vcp-drivers. Click "Downloads", then "CP210x
VCP Mac OSX Driver"

[Copy the remainder of the old page up but not including "If you have a favourite text editor, ..." as follows:]
and this will download the needed driver to the Download folder. <strong>Note</strong>: If the file is downloaded as a ZIP file then double-click
to uncompress. And then install.</p>
<p>Open the <code>Mac_OSX_VCP_Driver</code> folder and double-click <code>Silicon Labs VCP Driver.pkg</code> to install the drivers.
</p>
<p><img src="files/SL_VCP_Driver_v3.png" alt="" /></p>
<p>If the software is blocked a window will pop-up with instructions. Click <strong>Open System Preferences</strong>.</p>
<p><img src="files/System_Extension_Blocked_v2.png" alt="" /></p>
<p>Open the macOS <code>System Preferences</code> &gt; <code>Security &amp; Privacy</code> and click <strong>Allow</strong>.</p>
<p><img src="files/Security_Privacy_Allow_v3.png" alt="" /></p>
<p>Make sure you restart the Arduino IDE after installing the drivers. Before connecting the programmer, check <code>Tools &gt; Port</code>
and make note of the available ports. Now connect the programmer and your module (emonTx, emonTH, etc). Go back to the main menu and
select <code>Tools &gt; Port</code> again. <code>Port</code> should be available and showing a new port. Select the port
<code>/dev/cu.SLAB_USBtoUART</code>. And under <code>Tools &gt; Board</code> ensure <code>Arduino/Genuino Uno</code> is
selected.</p>
<p><img src="files/ToolsPortSLAB_v2.png" alt="" /></p>
Connecting the programmer
Use a USB-A or USB-Mini cable (whichever fits) to connect the programmer to your computer. The blue
“power” LED will light.

On the UART connector, the GND pin is labelled on the component side.

EmonTx

Plug the programmer into the emonTx with the component side of the board and the blue LED facing down
and the GND connection aligned with the engraving on the panel; that is, nearest to the aerial socket on the
emonTx.

EmonTx Shield
Plug the programmer into the emonTx Shield with the component side of the board facing inwards and the
GND connection farthest from the jack sockets.

EmonTH

Plug the programmer into the emonTH with the component side of the board facing inwards and the GND
connection farthest from the corner.
EmonPi Shield
Plug the programmer into the emonPi Shield with the component side of the board facing inwards towards the
centre of the board. Note that a separate 5 V USB power supply is needed to program the Shield, and for the
Shield to work in the absence of a Raspberry Pi.

Powering the Emon device

While loading and testing a sketch, the programmer can provide power to the emonTx and emonTH, using the
5 V connection.
The emonTx Shield and Arduino might draw a significant current at 5 V. This will require a separate power
supply if the USB power is insufficient. The maximum current that the programmer can supply at 3.3 V is 100
mA.
The emonPi Shield does not have the appropriate connection on the FTDI connector, therefore the normal
USB 5 V d.c. power must be supplied separately.
Finding the computer port
The general method is: list the ports, plug the programmer in, list the ports again and the new port that
appears is that which the programmer is connected to. Select it.
Linux, MacOS & Windows 10
In the Arduino IDE, and before connecting the programmer, check Tools > Port [or Serial Port]. If
Port is greyed out, that's OK, if not and any COM (serial) ports are listed, make a note of which ones they
are. Now connect the programmer and your module (emonTx, emonTH, etc). Go back to the main menu and
select Tools again. [Serial] Port should be available and showing a new port. Select that port. Under
MacOS, the port will possibly be called /dev/cu.SLAB_USBtoUART.
Assigning the programmer’s port (Linux only)
Under Linux, it is possible to assign the port that the programmer will appear on. In the directory
/etc/udev/rules.d create a file named 60-emonProgrammer.rules There needs to be one line per
device. The line for the Wicked Device Nanode/OEM programmer is:
SUBSYSTEM=="tty", ATTRS{idVendor}=="10c4", ATTRS{idProduct}=="ea60", SYMLINK+="FTDI", MODE="0666"
The programmer will now appear as a device: /dev/FTDI -> ttyUSB0
(The file may also contain a line for the FTDI LC231X programmer:
SUBSYSTEM=="tty", ATTRS{idVendor}=="0403", ATTRS{idProduct}=="6015", SYMLINK+="FTDI_LC231X", MODE="0666"
This programmer will now appear as a device: /dev/FTDI_LC231X -> ttyUSB0)
Unfortunately, the Arduino IDE does not recognise the symlinks.

There is a Forum discussion at https://community.openenergymonitor.org/t/how-to-match-a-ttyusbx-device-to-
a-usb-serial-device/8747

LED activity
A blue LED indicates “Power On”. The power may come from either the USB connector or the FTDI
connector. There is no indication of data flowing.