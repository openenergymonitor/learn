# Installing the Arduino IDE – Ubuntu Linux

<small>by Robert Wall</small>

<div class="note">

<p>Note: The Arduino version in your distro might not be the latest version. It is advisable to download
from the official <a href="https://www.arduino.cc/">Arduino</a> website.</p>

</div>

Arduino themselves have a wealth of information on installing the IDE on most operating systems
in the ['Get Started'](https://arduino.cc/en/Guide/HomePage) part of their website.

Follow the Arduino instructons. At the point where you run the `install.sh` script, there is no rightclick
“Run in Terminal” in Ubuntu, therefore continue with the next paragraph.

You do not need to install any additional USB drivers.

Serial Ports & the “Please Read...” section.

On Ubuntu Linux, the serial port for the programmer appears as `/dev/ttyUSB0`, meaning you need
to issue the command `$ ls -l /dev/tty*` to see it.

<div class="note">

<p>Hint: If you cannot identify the port, run the list command with the programmer and emon device
unplugged, then again with the programmer plugged in. Compare the two lists, and look for the new
item.</p>

</div>

When you succeed, the port will appear when you click `Tools > Port`.
Under `Tools > Board`, ensure `Arduino/Genuino Uno` is selected.
There is no need for specific board drivers for the Emon devices when used with the “shop”
programmer.

If you have a favourite text editor, you can use it instead of the built-in editor. `Select File >
Preferences` and tick the box `Use external editor`. When you use an external editor, your workflow
is slightly different. You must still open the sketch in the IDE, but the IDE does not open your editor -
you must yourself open the sketch file in your external editor, and save the file when editing is
done. Then you switch to the IDE where you can click `Verify` or `Upload` and the IDE will read
the file again and then proceed to compile it (“Verify”) or compile and upload it (“Upload”).

Read the section on [Installing the Libraries](ubuntulib) before you set your Sketchbook location (under
`Preferences`).
