<?php 




require_once __DIR__ . '/src/controller/user_controller.php';

$action = $_GET['action'] ?? 'home';

switch($action) {
     case 'linkedin_connect':
        include_once "./linkden/linkedin.php";
        break;
     case 'profile':
        include_once "./src/views/profile/profile.php";
        break;
      case 'sive_info':
        User_controller::update_Personal_Information(); 
        break;
         case 'uploud_cv':
        User_controller::aploade_cv(); 
        break;
    case 'test':

        include_once("./src/views/autonification/test.php");
        break;
      case 'aploade_image':
        User_controller::aploade_image(); 
        break;
    case 'p_login':
        include_once("./src/views/autonification/signin.php");
        break;
    case 'p_signup':
        include_once("./src/views/autonification/signup.php");
        break;
    case 'signup':
       User_controller::create_user(); // استدعاء الوظيفة من المتحكم
        break;
     case 'login':
       User_controller::login(); // استدعاء الوظيفة من المتحكم
        break;
    case 'home':
        include_once("./src/views/page_prancipale/page_prancipale.php");
        break;
    case '':
        include_once("./src/views/page_prancipale/page_prancipale.php");
        break;
    
   
}









?>