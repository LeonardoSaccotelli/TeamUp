## TEAMUP
TeamUp wants to meet all the people who have had to give up or have found it difficult to realize their ideas, trying to bring together people with the same goal so that they can help each other.

### Live Demo
A product demo is available at the following address: https://epsilonjsonteamup.altervista.org. Testing data can be viewed towards the end of the documentation.

### Requirements

* PHP 5.6 or higher (https://www.php.net/releases/5_6_0.php)
* MySql 5.6(https://dev.mysql.com/downloads/mysql/5.6.html)
* Hosting
* Client FTP

### Installation
First of all, to install the application it is necessary to have a domain on a specific hosting platform.
Initially you need to connect to the management panel of your hosting platform, and access the section relating to the reference DBMS, in order to create an empty database by giving it an initial name.
Once the newly created Database has been selected, go to the ```Import``` 'section and load the file ```epsilon.sql```, located in the directory ```/ TeamUp / Database /```, and finally click on ``` 'Run```; in this way all the tables on the site that we want to import will be loaded into our database.

Once the ``` Epsilon.sql``` file has been imported, select the table ``` wp-options ``` and edit the fields ```option-value ``` records 1 and 2 ```("siteurl"and "home ")```by entering the URL of your domain.

Once you have completed the previous step, you need to go to the directory ``` / TeamUp / TeamupWordpress /``` and open the file ```wp-config.php``` using any editor of text. Inside the file we have to modify the following fields by going to find the necessary information directly from the Hosting settings, in particular:


``
define ('DB_NAME', 'dbname');
``
inserting the name of the new database instead of ```dbname```.

``
define ('DB_USER', 'user');
``
going to insert instead of ```user``` the name of the user to associate the new database.

``
define ('DB_PASSWORD', 'psw');
``
inserting the current password of the new database instead of ```psw ```.

``
define ('DB_HOST', 'localhost');
``
inserting the name of the MySql Hostname instead of ``` localhost ```.

Then you need to go to the section relating to your FTP Client and upload all the files present in the directory ```/ TeamUp / TeamupWordpress /```.
At the end of the transfer, if every operation has been carried out correctly, the new site will be operational immediately.

### Access Data

### Admin

* admin: Prova123

### User

* davidegiordano94 : Prova123
* leosaccotelli96 : Prova123
* andreamanisi : Prova123
* vitocarulli96 : Prova123

## License

This software is released under the MIT License. See the <a href="">LICENSE</a> file for details.

The MIT License (MIT)

Copyright (c) 2020 Leonardo Saccotelli

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
