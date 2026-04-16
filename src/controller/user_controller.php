<?php

class User_controller
{
    public static function create_user()
    {
        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../core/Database.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($pdo, $_POST['First_Name'], $_POST['Last_Name'], $_POST['Email'], $_POST['Password'], $_POST['role']);
            $user->create();
            $us = $user->find($_POST['email']);
            session_start();
    $               $_SESSION["user_id"] = $us['id'];
                    $_SESSION["email"] = $us['email'];
                    $_SESSION["role"] = $us['role'];
                    $_SESSION["nom"] = $us['nom'];
                    $_SESSION["prenom"] = $us['prenom'];           
                    header("Location: index.php?action=test");
                    exit();
        }
    }
    public static function login()
    {
        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../core/Database.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (empty($_POST['email']) || empty($_POST['pwd'])) {
                header("Location: index.php?action=p_login&msg=champs vides");
                exit();
            }
            $user = new User($pdo, "yassin", "elk", $_POST['email'], $_POST['pwd'], "p");
            $us = $user->find($_POST['email']);

            if ($us) {
                if (password_verify($_POST['pwd'], $us["password_hash"])) {
                    $_SESSION["user_id"] = $us['id'];
                    $_SESSION["email"] = $us['email'];
                    $_SESSION["role"] = $us['role'];
                    $_SESSION["nom"] = $us['nom'];
                    $_SESSION["prenom"] = $us['prenom'];

                    header("Location: index.php?action=test");
                    exit();
                } else {
                    header("Location: index.php?action=p_login&msg=mot de passe incorrect");
                    exit();
                }
            } else {
                header("Location: index.php?action=p_login&msg=compte non trouvé");
                exit();
            }
        }
    }
    public static function aploade_image()
    {

        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../core/Database.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($pdo, "yassin", "elk", "yassin", "elk", "p");
            session_start();
            $us = $user->find($_SESSION["email"]);

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $upload_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;            // تأمين اسم الملف باستخدام طابع زمني لمنع التكرار 
                $image_name = time() . "_" . $_FILES['image']['name'];
                $target_path = $upload_dir . $image_name;

                move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                $user->uplode_image($us["id"], $image_name);
            }

            header("Location: index.php?action=test");
            exit();
        }
    }
    public static function update_Personal_Information()
    {
        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../core/Database.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User($pdo, "yassin", "elk", "yassin", "elk", "p");
            session_start();
            $u= $user->find($_SESSION["email"]);
            $arr=[$_POST['fName'], $_POST['fRole'], $_POST['fUni'],$_POST['Bio']];
            
            if ($u && isset($_POST) ){
                $user->edit_Personal_Information($u["id"],$arr);
            }
             
           

             header("Location: index.php?action=test");
            exit();
        }
    }
}
