## Edimax EW-7811 Wifi Adapter + RaspberryPI

The new Raspberry Pi 3 model B has onboard WIFI and so an external USB Wifi adapter is not needed. For older models without onboard WIFI an external adapter can be used. The Edimax EW-7811 Wifi adapter is a 

![](files/edimax.jpg)

## Using Web-config

Follow instructions: [https://github.com/openenergymonitor/raspap-webgui](https://github.com/openenergymonitor/raspap-webgui)

## Manual Setup

We need to edit /etc/network/interfaces on the root file system partition of the Pi's SD card.

Connect to the Pi via Ethernet and SSH, or connect a keyboard mouse and monitor to the Pi or edit the file on your computer. Assuming you connect to the Pi via SSH:

    sudo nano /etc/network/interfaces

Edit the interfaces file, inserting your SSID and password.

    auto lo
    iface lo inet loopback
    iface eth0 inet dhcp
    
    auto wlan0
    allow-hotplug wlan0
    iface wlan0 inet dhcp
    wpa-ssid "YOUR_SSID"
    wpa-psk "WIFI_PASSWORD"

[CTRL] + [X] to save the file, and exit nano

reboot the Pi, or the adapter:

    sudo ifdown wlan0; sudo ifup wlan0

Script to check for working wifi connection and restart wifi if needed [https://github.com/dweeber/WiFi_Check](https://github.com/dweeber/WiFi_Check)

Some users have reported disabling power saving on the Edimax module improves reliability:

[https://openenergymonitor.org/emon/node/2941](https://openenergymonitor.org/emon/node/2941)

$ sudo nano /etc/modprobe.d/8192cu.conf

add this line:

<pre>options 8192cu rtw_power_mgnt=0 <code></pre>

save the file, and reboot.

For terminal GUI and auto scanning of available Wifi networks wicd can be used:

<pre>sudo apt-get install wicd-curses sudo wicd-curses</pre>

[http://www.raspyfi.com/wi-fi-on-raspberry-pi-a-simple-guide/](http://www.raspyfi.com/wi-fi-on-raspberry-pi-a-simple-guide/)
