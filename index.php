<?php 




require_once __DIR__ . '/src/controller/user_controller.php';

$action = $_GET['action'] ?? 'home';

switch($action) {
      case 'sive_info':
        User_controller::update_Personal_Information(); 
        break;
    case 'test':
        include("./src/views/autonification/test.php");
        break;
      case 'aploade_image':
        User_controller::aploade_image(); 
        break;
    case 'p_login':
        include("./src/views/autonification/signin.php");
        break;
    case 'p_signup':
        include("./src/views/autonification/signup.php");
        break;
    case 'signup':
       User_controller::create_user(); // استدعاء الوظيفة من المتحكم
        break;
     case 'login':
       User_controller::login(); // استدعاء الوظيفة من المتحكم
        break;
    case 'home':
        include("./src/views/page_prancipale/page_prancipale.php");
        break;
    case '':
        include("./src/views/page_prancipale/page_prancipale.php");
        break;
    
   
}









?>