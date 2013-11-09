Welcome to MuffinPHP Guide
=========

MuffinPHP is a PHP framework that has been realized for the course PHPMVC at BTH university (Karlskrona). The aim of the projet was to to learn advanced php programming with a deeper sense of what a Model View Controller is. Also, during this course I have explored a wide array of external libraries, which includes: HTMLPurifier, PHP Markdown, PHP SmartyPants,PHP Typographer, LessPHP, SimplePie and Semantic Grid System. 

How To Install MuffinPHP (in 5 minutes)
=========

1.You can download the latest version of MuffinPHP from github.
	git clone git://github.com/a-aranda/MuffinPHP.git

2. Upload the contents of the folder MuffinPHP to your server.

3. To set up the database, you will have to make the site/data directory writable. If you are in a terminal, you can write these commands:

	cd MuffinPHP;
	chmod 777 site/data

If you are using a FTP program to upload the files such as Filezilla, you can also click on the site/data folder and in the input of numeric value write 777.

4. Now you can point your browser to your domain root (e.g. http://example.com) and you will be able to see a welcome page from MuffinPHP. Notice that if you don't see the MuffinPHP welcome page probably means that you didn't install the framework in the root directory. For example, if you moved the folder MuffinPHP, then you should point your browser to http://example.com/muffinphp/.

5. As the final step, MuffinPHP has some modules that need to be initialized. You can do this through a controller. Point your browser to the following link.
	http://yourdomain/module/install

Congratulations, you have installed the latest version of MuffinPHP :)

