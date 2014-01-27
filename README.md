Welcome to MuffinPHP Guide
=========

MuffinPHP is a PHP framework that has been realized for the course PHPMVC at BTH university (Karlskrona). The aim of the projet was to to learn advanced php programming with a deeper sense of what a Model View Controller is. Also, during this course I have explored a wide array of external libraries, which includes: HTMLPurifier, PHP Markdown, PHP SmartyPants,PHP Typographer, LessPHP, SimplePie and Semantic Grid System. 

How To Install MuffinPHP (in 5 minutes)
=========

1.You can download the latest version of MuffinPHP from github. (git clone git://github.com/a-aranda/MuffinPHP.git)

2. Upload the contents of the folder MuffinPHP to your server.

3. Update the htaccess file. For bth servers, just by pointing the RewriteBase to the current url would be enough.

4. From this point you will have a link to /muff-config that will help you setting up the rest of the framework.

Congratulations, you have installed the latest version of MuffinPHP :)

Use and Customization of the Framework
=========

**Logo:**
For changing the logo, two steps are necessary. The first one is to upload the picture of the logo to the corresponding folder. For example, in the case of the muffin theme (called mytheme), it should be uploaded in the img folder.

Update the name of the logo in the config.php file, in the muff->config['theme'] arrray.

**Web Site Title:**
The title of the theme can be changed in the config.php file. In the array $muff->config['theme'] the variable called "header" contains the title of the theme.

**Navigation Menu:**
For a personalized navigation, it is just needed to modify the the muff->config['menus'] in the config.php file. You can create different navbars arrays and in the muff-config['theme'], in the menu_to_region option, you can add the menus that have been modified or added.

**Footer:**
For changing the footer is needed to change the footer option in the muff-config['theme'] that is located in the config.php file of the framework.

**Creating a blog:**
To create a blog you just need to go to the content module and press the "create new content" link. After filling the title, key and content, you should select "post" as the type, and you can select different filters for the content (bbcode, htmlpurify, plain, make_clickable, markdown, smartypants or typographer).

**Creating a page:**
Creating a page is very similar to creating a blog post. In the content module there is a link called "create new content". The most important part is to put "page" as the type of the content. You can also select which type of filter you need for the page (bbcode, htmlpurify, plain, make_clickable, markdown, smartypants or typographer).

**Creating Your Own Theme**
If you want to create a new theme, the first step is to create a folder in the site/theme/ directory with the name of the theme that you want. In this folder you should create a style.css file and an img folder if you plan on using images.
The next step is to check the config.php file, specially the main arrays of data related to the theme variables, such as the muff-config['theme'] and the muff-config['menus']. Here you will be able to update the path to the logo, update the title , footer, slogan and menus of the theme.

**Create a blog from scratch**
In the framework there is a controller called CCBlog that has the basic settings for listing posts. The only thing you need is to create a new controller and create a method that calls the CMContent module. A very good starting point is to see the CCMyController, in which there is a simple Blog running with a basic template (blog.tpl.php). Notice the Blog function in CCMycontroller.php. 
