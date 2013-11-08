<h1>Welcome to MuffinPHP</h1>
<p>MuffinPHP is a php framework that makes building websites and web applications easier and faster. 
	It works with Bootstrap, which can enhance the development even further if needed, and you can check the documentation of the classes in the module section.</p>
<h2>5-Minute Install of Muffin PHP <small><a href="<?=theme_url('content/5-MinuteInstallation.pdf')?>">(pdf)</a></small></h2>
<p>1. You can download MuffinPHP from github.</p>
<blockquote>
<code>git clone git://github.com/a-aranda/MuffinPHP.git</code>
</blockquote>
<p>2. Upload the contents of the folder MuffinPHP to your server.</p>
<p>3. To set up the database, you will have to make the site/data directory writable. If you are in a terminal, you can write these commands:</p>
<blockquote>
	<code>
		cd MuffinPHP <br>	
		chmod 777 site/data
	</code>
</blockquote>
<p>If you are using a FTP program to upload the files such as <a href="https://filezilla-project.org">Filezilla</a>, you can also click on the site/data folder and in the input of numeric value write 777 (see pictures below).</p>
<br>
<center>
	<img src="<?=theme_url('img/guide1.png')?>" width="200px" alt="">
	<img src="<?=theme_url('img/guide2.png')?>" width="300px" alt="">
</center>
<br>
<p>4. Now you can point your browser to your domain root (e.g. http://example.com) and you will be able to see a welcome page from MuffinPHP. Notice that if you don't see the MuffinPHP welcome page probably means that you didn't install the framework in the root directory. For example, if you moved the folder MuffinPHP, then you should point your browser to http://example.com/muffinphp/.</p>
<p>5. As the final step, MuffinPHP has some modules that need to be initialized. You can do this through a controller. Point your browser to the following link.</p>
<blockquote>http://yourdomain/module/install</blockquote>
<p>If you are already following this guide in your own domain, you can also click here to install it:</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>
<p>Congratulations! You have installed the latest version of MuffinPHP.</p>