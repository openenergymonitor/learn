## Notes on ESP-R Open Source building simulation program

[http://www.esru.strath.ac.uk/Programs/ESP-r.htm](http://www.esru.strath.ac.uk/Programs/ESP-r.htm)

![](files/espr.png)

### Installation on Ubuntu 11.04

If you dont have these already, you will need:

<pre>$ sudo apt-get install subversion
$ sudo apt-get install build-essential
$ sudo apt-get install gfortran
$ sudo apt-get install xfig
</pre>

Installation of esp-r as decribed on page 18 (4.2) http://www.esru.strath.ac.uk/Documents/ESP-r_developers_doc.pdf

<pre>$ cd
$ mkdir Src
$ cd Src
$ mkdir cvsdude
$ cd cvsdude
$ svn checkout https://espr.svn.cvsdude.com/esp-r/branches/development_branch
$ cd development_branch/src
$ sudo ./Install -d /opt/esru --gcc4 --reuse_ish_calcs</pre>

Add path to _.bashrc_

<pre>$ cd
$ nano .bashrc</pre>

Add the path below to the end of the file:

<pre>export PATH=$PATH:/opt/esru/bin:/opt/esru/esp-r/bin</pre>

**Run:**

<pre>$ esp-r</pre>

**Cookbook**

[http://www.esru.strath.ac.uk/Documents/ESP-r_cookbook_july_2011.pdf](http://www.esru.strath.ac.uk/Documents/ESP-r_cookbook_july_2011.pdf)
