## Installing the Arduino Libraries – Windows 10
<small>by Robert Wall</small>
***

Before you install the libraries, it would be a good idea to think about how you will organise your
Emon data. When you installed the Arduino IDE, it created a folder “Arduino” and beneath it a
folder “libraries”. If you’re happy with that, then you should install the libraries in there.

However, I prefer to have a folder that contains everything related to OpenEnergyMonitor. That
folder, which I've called 'OEM' is at the top level in my personal area, i.e. ….\Documents and
Settings\[user]\OEM. Beneath that I have folders for Drawings, Manuals & Leaflets, and
importantly that which concerns us here, Software. The Software folder contains sub-folders that
will eventually contain more sub-folders for sketches for the various modules, and a 'libraries' folder
for the Arduino Libraries. This is the structure:

It is most important that the “libraries” folder is at the same level in the hierarchy as the folders, or
some ancestor of the folders, that will eventually contain the sketches. The parent of 'libraries', in
this example called “Software” is what the Arduino documentation and the IDE refers to as the
“Sketchbook”. You can choose whatever name you want for this folder.

<div class="note">

<p>Important: This is NOT the same 'libraries' folder that is part of the Arduino IDE. If you put
the OEM libraries in there, they will work but when you update the Arduino IDE, by default it
installs in a completely new folder and you will have to move or copy these libraries. For that
reason it is not recommended</p>

</div>

#### 1) Downloading the Libraries

Many libraries are required, this is the full list:
JeeLib
RFu_JeeLib
https://github.com/jcw/jeelib
https://github.com/openenergymonitor/RFu_jeelib
RFu JeeLib is only required for emonTx V3.2 and emonTH V1.4
using the RFu328 module.
EmonLib https://github.com/openenergymonitor/EmonLib
OneWire https://github.com/PaulStoffregen/OneWire
DallasTemperature https://github.com/milesburton/Arduino-Temperature-Control-
 Library
RTClib https://github.com/jcw/rtclib Only required for EmonGLCD
GLCD_ST7565 https://github.com/jcw/glcdlib Only required for EmonGLCD
EtherCard https://github.com/jcw/ethercard/ Only required for NanodeRF
Go to each of the websites in turn. Download the zip file for each to your usual place – on GitHub
the button is on the right-hand side. Click “Clone or download” followed by “Download ZIP”:

#### 2) Installing the Libraries

When you have downloaded all the files, go to your download location and from there you need to
extract the contents of each Zip file in turn: Double-click on the zip file, a window will open
showing the contents. Drag that folder into the “libraries” folder.

#### 3) Renaming the Libraries

The Arduino IDE does not allow hyphens '-' in the library folder names. Therefore you must rename
the folders to the names below. You should end up with this:
[If you wish, you can now delete the zip files that you downloaded.]

#### 4) Check the Libraries

If your Arduino IDE is running, close all open windows and shut it down completely. Start (or
restart) the IDE. First you must tell the IDE where your 'Sketchbook' is located. Click on File >
Preferences and at the top for “Sketchbook location” browse to and select your “Software” folder,
then dismiss the Preferences window with OK. Click on Sketch > Include Library and you should
see the list of libraries. The ones you just installed should be listed under “Contributed libraries”.
[Note: The IDE only checks the libraries at start-up. Each time you change or add a library, you
must completely shut down and restart the IDE.]