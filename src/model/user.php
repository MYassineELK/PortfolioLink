<?php
require_once __DIR__ . '/../IA/AIClient.php';
class User
{
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password_hash;
    private string $role;
    private string $photo_url;
    private string $linkedin_url;
    private PDO    $pdo;

    public function __construct(
        PDO    $pdo,
        string $nom,
        string $prenom,
        string $email,
        string $password_hash,
        string $role,
        string $photo_url    = "",
        string $linkedin_url = ""
    ) {
        $this->pdo           = $pdo;
        $this->nom           = $nom;
        $this->prenom        = $prenom;
        $this->email         = $email;
        $this->password_hash = $password_hash;
        $this->role          = $role;
        $this->photo_url     = $photo_url;
        $this->linkedin_url  = $linkedin_url;
    }


    public function create()
    {

        $u = $this->pdo->prepare("select * from users where email=? ");

        $u->execute([$this->email]);
        $isu = $u->fetch();
        if (empty($isu)) {
            $stmt = $this->pdo->prepare(
                "INSERT INTO users (nom, prenom, email, password_hash, role, photo_url, linkedin_url, created_at, updated_at)
             VALUES (:nom, :prenom, :email, :password_hash, :role, :photo_url, :linkedin_url, :created_at, :updated_at)"
            );

            return $stmt->execute([
                ':nom'           => $this->nom,
                ':prenom'        => $this->prenom,
                ':email'         => $this->email,
                ':password_hash' => password_hash($this->password_hash, PASSWORD_BCRYPT),
                ':role'          => $this->role,
                ':photo_url'     => $this->photo_url,
                ':linkedin_url'  => $this->linkedin_url,
                ':created_at'    => date("Y-m-d H:i:s"),
                ':updated_at'    => date("Y-m-d H:i:s"),
            ]);
        } else {
            echo "this acount exists";
        }
    }

    public  function latest()
    {
        $list = $this->pdo->prepare("select * from users");
        $list->execute();
        return $list;
    }

    public function view(int $id)
    {
        $user = $this->pdo->prepare("select * from users where id =?");
        $user->execute([$id]);
        return $user;
    }
    public function find(string $email)
    {
        $user = $this->pdo->prepare("select * from users where email =?  ");
        $user->execute([$email]);
        return $user->fetch(PDO::FETCH_ASSOC);
    }
    public function findetd(string $email)
    {
        $user = $this->pdo->prepare("SELECT * FROM `v_student_public_profile` WHERE email=?  ");
        $user->execute([$email]);
        return $user->fetch(PDO::FETCH_ASSOC);
    }

    public function edit_complate(int $id, array $fields)
    {
        $u = $this->pdo->prepare("select * from users where id=?");
        $u->execute([$id]);
        if (!empty($u->fetch())) {
            $up = $this->pdo->prepare("UPDATE users SET nom=?,prenom
           =?,email=?,password_hash=?,
           photo_url=?,linkedin_url=?,updated_at=?,image=? WHERE id=?");
            $up->execute([$fields[0], $fields[1], $fields[2], $fields[3], $fields[4], $fields[5], date("Y-m-d H:i:s"), $id]);
            echo "valid";
        } else {
            echo "not valid";
        }
    }
     public function edit_Personal_Information(int $id, array $fields)
    {
        var_dump($id);
        var_dump($fields);
        $u = $this->pdo->prepare("select * from student_profiles where student_id=?");
        $u->execute([$id]);
        if (!empty($u->fetch())) {
            $up = $this->pdo->prepare("UPDATE `student_profiles` SET `filiere`=?,`etablissement`=?,`bio`=?,`updated_at`=? WHERE student_id=?");
            $up->execute([$fields[1], $fields[2], $fields[3], date("Y-m-d H:i:s"), $id]);
        } else {
           $up = $this->pdo->prepare("INSERT INTO 
           `student_profiles`(`student_id`, `filiere`, `annee_etude`, `etablissement`, `ville`, `bio`, `cv_url`, `portfolio_url`, `disponibilite`, `updated_at`) 
           VALUES (?,?,1,?,'[value-5]',?,'[value-7]','[value-8]','[value-9]',?)");
            $up->execute([$id,$fields[1], $fields[2], $fields[3], date("Y-m-d H:i:s")]); 
        }
    }

    public function uplode_image(int $id, string $image)
    {
        $u = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $u->execute([$id]);

        if ($u->fetch()) {
            $up = $this->pdo->prepare("UPDATE users SET photo_url = ? WHERE id = ?");

            if ($up->execute([$image, $id])) {
                echo "valid";
            } else {
                echo "error during update";
            }
        } else {
            echo "not valid";
        }
    }
     public function uplode_cv(int $id, string $cv)
    {
        $u = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $u->execute([$id]);

        if ($u->fetch()) {
            $up = $this->pdo->prepare("UPDATE `student_profiles` SET `cv_url`=? WHERE student_id=?");

            if ($up->execute([$cv, $id])) {
                exit();
            } else {
                echo "error during update";
            }
        } else {
            echo "not valid";
            exit();
        }
    }

    public function destroy(int $id)
    {
        $u = $this->pdo->prepare("select * from users where id=? ");
        $u->execute([$id]);
        if (!empty($u->fetch())) {
            $list = $this->pdo->prepare("delete from users where id =?");
            $list->execute([$id]);
        } else {
            echo "not ex";
        }
    }
    public function generateBio(int $userId): string
    {
        // ✅ جيب البيانات كـ array
        $stmt = $this->view($userId);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // ✅ تحقق إذا الطالب موجود
        if (empty($user)) {
            return "المستخدم غير موجود.";
        }

        $ai = new AIClient();

        // ✅ استخدم الأعمدة الصحيحة من جدولك
        $prompt = "write a story in arabic";

        return $ai->generateBio($prompt);
    }
}
