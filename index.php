<?php
	require "main.php";

	print_r($_SESSION);
	exit;
	if (isset($_SESSION['token'])) {
	  try {
          
          $res = $fb->get('/me/accounts', $_SESSION['token']);
          $res = $res->getDecodedBody();
          
          foreach($res['data'] as $page){
              echo $page['id'] . " - " . $page['name'] . "<br>";
              
          }
          
          ?>
        
        <form method = "post" action = "page.php">
            <input type = "text" name = "pageid" placeholder = "Page ID">
            <input type = "text" name = "message" placeholder="Message">
            <input type = "submit">
        </form>

        <?php
          
	  } catch( Facebook\Exceptions\FacebookSDKException $e ) {
	      session_destroy();
          header("Refresh:0");
	  }
	}
	else{
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['pages_show_list', 'pages_read_engagement', 'pages_manage_posts'];
		$callback    = 'http://localhost/social/app.php';
		$loginUrl    = $helper->getLoginUrl($callback, $permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
?>
