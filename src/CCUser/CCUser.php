<?php
/**
 * A user controller  to manage login and view edit the user profile.
 * 
 * @package MuffinPHP Core
 */
class CCUser extends CObject implements IController {

/**
 * Constructor
 */
public function __construct() {
  parent::__construct();
}

/**
 * Show profile information of the user.
 */
public function Index() {
  $this->views->SetTitle('User Controller');
          $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
                'is_authenticated'=>$this->user['isAuthenticated'], 
                'user'=>$this->user,
              ));
}

/**
 * View and edit user profile.
 */
public function Profile() {   
  $user = new CMUser(); 
  $form = new CFormUserProfile($this, $this->user);
  $content = new CMContent(); 
  if($form->Check() === false) {
    $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
    $this->RedirectToController('profile');
  }
  $this->views->SetTitle('User Profile');
  $this->views->AddInclude(__DIR__ . '/profile.tpl.php', array(
    'is_authenticated'=>$this->user['isAuthenticated'], 
    'user'=>$this->user,
    'profile_form'=>$form->GetHTML(),
    'users'=>$user->showUsers(),
    'groups' => $user->showGroups(),
    'allow_create_user' => CMuffinPHP::Instance()->config['create_new_users'],
    'create_user_url' => $this->CreateUrl(null, 'create'),
    'create_group_url' => $this->CreateUrl(null, 'CreateGroup'),
    'create_profile_user_url' => $this->CreateUrl('user','ProfileUser', null),
    'delete_profile_user_url' => $this->CreateUrl('user','DeleteUser', null),
    'create_user_into_group' => $this->CreateUrl('user','UserIntoGroup', null),
    'create_user_into_group_delete' => $this->CreateUrl('user','DeleteUserIntoGroup', null),
    'delete_group_url' => $this->CreateUrl('user','DeleteGroup', null),
    'edit_group_url'          => $this->CreateUrl('user','GroupId', null),
    'contents' => $content->ListAll(),
  ));
}

/**
 * View and edit user profile with and id
 */
public function ProfileUser($id) {   
  $user = new CMUser(); 
  $u= $user->findUserWithID($id);
  $form = new CFormUserProfile($this, $u[0] );
  if($form->Check() === false) {
    $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
    $this->RedirectToController('profileUser');
  }
  $this->views->SetTitle('User Profile');
  $this->views->AddInclude(__DIR__ . '/profileUser.tpl.php', array(
    'user'=>$u,
    'profile_form'=>$form->GetHTML(),
    'goBackAdmin' => $this->CreateUrl('user','profile', null),
  ));
}

/**
 * View and edit user profile with and id
 */
public function GroupId($id) {   
   $user = new CMUser();
  //echo "<br><br>This id the id: ".$id ;
  $g= $user->findGrupWithID($id);
  $form = new CFormGroups($this, $g[0] );
  if($form->Check() === false) {
    $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
    $this->RedirectToController('groupId');
  }
  $this->views->SetTitle('Group Managing');
  $this->views->AddInclude(__DIR__ . '/group.tpl.php', array(
    'profile_form'=>$form->GetHTML(),
    'goBackAdmin' => $this->CreateUrl('user','profile', null),
  ));
}



/**
 * View and edit user profile.
 */
public function DeleteUser($id) {   
  $user = new CMUser(); 
  $u = $user->deleteUserWithID($id);
  $this->RedirectToController('profile');
}

/**
 * View and edit user profile.
 */
public function DeleteGroup($id) {   
  $user = new CMUser(); 
  $user->deleteGroupWithID($id);
  $this->RedirectToController('profile');
}


/**
 * Change the password.
 */
public function DoChangePassword($form) {
  if($form['password']['value'] != $form['password1']['value'] || empty($form['password']['value']) || empty($form['password1']['value'])) {
    $this->AddMessage('error', 'Password does not match or is empty.');
  } else {
    $ret = $this->user->ChangePassword($form['password']['value']);
    $this->AddMessage($ret, 'Saved new password.', 'Failed updating password.');
  }
  $this->RedirectToController('profile');
}

/**
 * Save updates to profile information.
 */
public function DoProfileSave($form) {
  $this->user['name'] = $form['name']['value'];
  $this->user['email'] = $form['email']['value'];
  $ret = $this->user->Save();
  $this->AddMessage($ret, 'Saved profile.', 'Failed saving profile.');
  $this->RedirectToController('profile');
}

/**
 * Save updates to profile information.
 */
public function DoGroupSave($form) {
  $name = $form['name']['value'];
  $acronym = $form['acronym']['value'];
  $id = $form['id']['value'];
  $ret = $this->user->GroupSave($name, $acronym,$id);
  $this->AddMessage($ret, 'Saved group.', 'Failed saving profile.');
  $this->RedirectToController('profile');
}

/**
 * Authenticate and login a user.
 */
public function Login() {
  $form = new CFormUserLogin($this);
  if($form->Check() === false) {
    $this->AddMessage('notice', 'You must fill in acronym and password.');
    $this->RedirectToController('login');
  }
  $this->views->SetTitle('Login');
              $this->views->AddInclude(__DIR__ . '/login.tpl.php', array(
                'login_form' => $form,
                'allow_create_user' => CMuffinPHP::Instance()->config['create_new_users'],
                'create_user_url' => $this->CreateUrl(null, 'create'),
              ));
}

/**
 * Perform a login of the user as callback on a submitted form.
 */
public function DoLogin($form) {
  if($this->user->Login($form['acronym']['value'], $form['password']['value'])) {
    $this->AddMessage('success', "Welcome {$this->user['name']}.");
    $this->RedirectToController('profile');
  } else {
    $this->AddMessage('notice', "Failed to login, user does not exist or password does not match.");
    $this->RedirectToController('login');      
  }
}

/**
 * Logout a user.
 */
public function Logout() {
  $this->user->Logout();
  $this->RedirectToController();
}

/**
 * Init the user database.
 */
public function Init() {
  $this->user->Init();
  $this->RedirectToController();
}

/** 
* Create a new user. 
*/ 
public function Create() { 
$form = new CFormUserCreate($this); 
if($form->Check() === false) { 
$this->AddMessage('notice', 'You must fill in all values.'); 
$this->RedirectToController('Create'); 
} 
$this->views->SetTitle('Create user');
$this->views->AddInclude(__DIR__ . '/create.tpl.php', array('form' => $form->GetHTML())); 
}

/** 
* Create a new user. 
*/ 
public function CreateGroup() { 
$form = new CFormGroupCreate($this); 
if($form->Check() === false) { 
$this->AddMessage('notice', 'You must fill in all values.'); 
$this->RedirectToController('CreateGroup'); 
} 
$this->views->SetTitle('Create Group');
$this->views->AddInclude(__DIR__ . '/createGroup.tpl.php', array('form' => $form->GetHTML())); 
}

/**
 * View and edit user profile with and id
 */
public function UserIntoGroup($idUser) {   
  $form = new CFormUserIntoGroup($this, $idUser );
  if($form->Check() === false) {
    $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
    $this->RedirectToController('UserIntoGroup');
  }
  $this->views->SetTitle('Insert into Group');
  $this->views->AddInclude(__DIR__ . '/UserIntoGroup.tpl.php', array(
    'profile_form'=>$form->GetHTML(),
    'goBackAdmin' => $this->CreateUrl('user','profile', null),
  ));
}

/**
 * View and edit user profile with and id
 */
public function DeleteUserIntoGroup($idUser) {   
  $form = new CFormDeleteUserIntoGroup($this, $idUser );
  if($form->Check() === false) {
    $this->AddMessage('notice', 'Some fields did not validate and the form could not be processed.');
    $this->RedirectToController('DeleteUserIntoGroup');
  }
  $this->views->SetTitle('Delete from Group');
  $this->views->AddInclude(__DIR__ . '/DeleteUserIntoGroup.tpl.php', array(
    'profile_form'=>$form->GetHTML(),
    'goBackAdmin' => $this->CreateUrl('user','profile', null),
  ));
}

/** 
* Perform a creation of a user as callback on a submitted form. 
* 
* @param $form CForm the form that was submitted 
*/ 
public function DoCreate($form) { 
if($form['password']['value'] != $form['password1']['value'] || empty($form['password']['value']) || empty($form['password1']['value'])) { 
  $this->AddMessage('error', 'Password does not match or is empty.'); 
  $this->RedirectToController('create'); 
} else if($this->user->Create($form['acronym']['value'], 
    $form['password']['value'], 
    $form['name']['value'], 
    $form['email']['value'] 
    )){ 
      $this->AddMessage('success', "Welcome {$this->user['name']}. Your have successfully created a new account."); 
      $this->user->Login($form['acronym']['value'], $form['password']['value']); 
      $this->RedirectToController('profile'); 
  } else { 
    $this->AddMessage('notice', "Failed to create an account."); 
    $this->RedirectToController('create'); 
  } 
}

/** 
* Perform a creation of a user as callback on a submitted form. 
* 
* @param $form CForm the form that was submitted 
*/ 
public function DoGroupCreate($form) { 
if($this->user->GroupCreate($form['acronym']['value'], $form['name']['value'])){ 
      $this->AddMessage('success', "Group successfully created");  
      $this->RedirectToController('profile'); 
  } else { 
    $this->AddMessage('notice', "Failed to create group."); 
    $this->RedirectToController('createGroup'); 
  } 
}

/** 
* Perform a creation of a user as callback on a submitted form. 
* 
* @param $form CForm the form that was submitted 
*/ 
public function DoUserIntoGroupSave($form) { 
if($this->user->UserIntoGroupCreate($form['userId']['value'],$form['groupId']['value'])){ 
      $this->AddMessage('success', "Insertion of User to Group successfully created");  
      $this->RedirectToController('profile'); 
  } else { 
    $this->AddMessage('notice', "Failed to create group."); 
    $this->RedirectToController('UserIntoGroup'); 
  } 
}

/** 
* Perform a creation of a user as callback on a submitted form. 
* 
* @param $form CForm the form that was submitted 
*/ 
public function DoUserIntoGroupDelete($form) { 
if($this->user->UserIntoGroupDelete($form['userId']['value'],$form['groupId']['value'])){ 
      $this->AddMessage('success', "Insertion of User to Group successfully created");  
      $this->RedirectToController('profile'); 
  } else { 
    $this->AddMessage('notice', "Failed to create group."); 
    $this->RedirectToController('DeleteUserIntoGroup'); 
  } 
}

} 