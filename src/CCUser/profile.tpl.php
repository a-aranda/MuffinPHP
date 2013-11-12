<?php if($is_authenticated): ?>
<?php
	$admin = false;
	foreach ($user['groups'] as $group){
		if ($group['name']==="The Administrator Group")
			$admin = true;
	}

	if ($admin){
		echo "<h1>Administrator panel</h1>";
		echo "<p class='success'>You are logged as administrator.</p>";
	

		/*Administrator Part*/
		echo "<br><h3>User management</h3>";
		echo "<p>These are the users that are registered in the system:</p>";
		$i=-1;

		
		echo "<table border='1'>";
		echo "<thead>
			    <tr>
			      <th>Acronym</th>
			      <th>Name</th>
			      <th>Mail</th>
			      <th>Edit</th>
			      <th>Delete</th>
			    </tr>
			  </thead>";

		foreach ($users as $user){
			echo "<tr>";
			$i++;
			$currentUser = $create_profile_user_url."/".$users[$i]['id'];
			$currentDelete = $delete_profile_user_url."/".$users[$i]['id'];
			echo "<td>".$user['acronym']."</td>";
			echo "<td>".$user['name']."</td>";
			echo "<td>".$user['email']."</td>";
			echo "<td><a href='$currentUser'>Edit Profile</a></td>";
			echo "<td><a href='$currentDelete'>Delete Profile</a></td>";
			//echo "<p>User acronym: ".$user['acronym'].", User name: ".$user['name'].", Email:".$user['email']."</p>";
			//echo "<a href='$currentUser'>Edit</a>";
			echo "<tr>"; 
		}

		echo "</table><br>";
		echo "<p>You can create new Users in the following link:</p>";
		if($allow_create_user)
			echo "<a href='$create_user_url'>Create User</a><br>";

		/*Administrator Part*/
		echo "<br><h3>Group management</h3>";
		echo "<p>These are the groups that are registered in the system:</p>";
		echo "<table border='1'>";
		echo "<thead>
			    <tr>
			      <th>Acronym</th>
			      <th>Name</th>
			    </tr>
			  </thead>";

		foreach ($groups as $group){
			echo "<tr>";
			echo "<td>".$group['acronym']."</td>";
			echo "<td>".$group['name']."</td>";
			echo "<tr>"; 
		}
		echo "</table><br>";
	}



 ?>

<h2>My Own Profile</h2>
<p>You can view and update your profile information.</p>
  <?=$profile_form?>
<!--   <p>You were created at <?=$user['created']?> and last updated at <?=$user['updated']?>.</p>
  <p>You are member of <?=count($user['groups'])?> group(s).</p>
  <ul>
  <?php foreach($user['groups'] as $group): ?>
    <li><?=$group['name']?>
  <?php endforeach; ?>
  </ul> -->
<?php else: ?>
  <p>User is anonymous and not authenticated.</p>
<?php endif; ?>