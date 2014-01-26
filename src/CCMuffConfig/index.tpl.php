<h1>Welcome to the Installation of MuffinPHP</h1>

<h2>Step 1: Checking minimun requirements for the framework</h2>
<p>The current version of php in the server is: <?=phpversion()?></p>

<?php
if (version_compare(phpversion(), '5.0', '<')) {
    echo "<p class=\"warning\">The current version of php in your server is not compatible with this framework. Try to update to at least php 5.0</p>";
    echo "<p class=\"warning\">It was not possible to install MuffinPHP due to the php version of the server.</p>";
    return;
} else{
	echo "<p class=\"info\">The PHP version is compatible (minimum required 5.0).</p>";
}
?>

<h2>Checking the compatibility of the database</h2>

<?php
$filename = MUFFINPHP_INSTALL_PATH . '/site/data/.ht.sqlite';
$foldername = MUFFINPHP_INSTALL_PATH . '/site/data/';

if (file_exists($filename)) {
    echo "<p class=\"info\">First step of database compatibility completed. I found the database in: <br>$filename</p>";
} else {
    echo "<p class=\"warning\">I was expecting to find the database in: <br>$filename. <br>Check if it exists, if not create it in that location.</p>";
    echo "<p class=\"warning\">It was not possible to install MuffinPHP due to not finding the database.</p>";
    return;
}

// echo "<h2>Database Credentials</h2>";
// echo $db_form;

// if (isset($_POST['username'])){
// echo "<p class=\"info\"> This is the data that you introduced (check the description, this is not saved):<br>
//         As username: ".$_POST['username']."<br>
//         Password is secret <br>
//         Host introduced: ".$_POST['host']."<br>
//         Database: ".$_POST['database']."
// </p>";
// }

echo "<p>The second step is about file permissions. The data folder and the database should been writable:</p>";
echo "<p>You have to manually give chmod 777 to these two files:</p>";
echo "<p>$filename<br>$foldername</p>";

if ( is_writable(MUFFINPHP_INSTALL_PATH . '/site/data'))
	echo "<p class=\"info\">The data folder is writtable.</p>";
else {
	echo "<p class=\"warning\">The data folder is not writable, please chmod 777 to the folder.</p>";
    echo "<p>Once you give the rights to the folder <a href='<?=create_url('muff-config')?>'>click here</a> or refresh the site.</p>"
	return;
}

if ( is_writable(MUFFINPHP_INSTALL_PATH . '/site/data/.ht.sqlite'))
	echo "<p class=\"info\">Perfect, also the database is writable.</p>";
else {
	echo "<p class=\"warning\">The database  is not writable, please chmod 777 the database.</p>";
    echo "<p>Once you give the rights to the database <a href='<?=create_url('muff-config')?>'>click here</a> or refresh the site.</p>"
	return;
}
echo "<p class=\"info\">Setting up the database completed!</p>";

?>

<h2>The very last step</h2>
<p>There are some modules that need some initiation. These are the results:</p>

<?php 
	$modules = new CMModules();
    $results = $modules->Install();
    $allModules = $modules->ReadAndAnalyse();
 ?>

<table>
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php foreach($results as $module): ?>
  <tr><td><?=$module['name']?></td><td><div class='<?=$module['result'][0]?>'><?=$module['result'][1]?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>

<p class="info">You see, the installation was very easy. And now you can enjoy this marvellous muffin: <span class="muffin" style="margin-left:6px;"></span></p>
