<?php


namespace models;
require_once(__DIR__ . "/Model.php");
class User extends Model
{
    private const table = 'users';
    private const DOCTOR_TYPE_ID = 1;

    /**
     * @param array $data
     *
     */
    public function login(array $data)
    {
        $login    = $data['login'];
        $password = $data['password'];

        $sql = "SELECT id, name, user_type FROM ".self::table." WHERE login = :login AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":password", md5($password));
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function register(array $data): bool
    {
        $sql = "INSERT INTO ".self::table."(name, login, phone, email, password, user_type)
				VALUES (:name, :login, :phone, :email, :password, :user_type)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":login", $data['login']);
        $stmt->bindValue(":name", $data['name']);
        $stmt->bindValue(":phone", $data['phone']);
        $stmt->bindValue(":email", $data['email']);
        $stmt->bindValue(":password", md5($data['password']));
        $stmt->bindValue(":user_type", $data['type']);

        return $stmt->execute();
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
    }

    /**
     * @return array
     */
    public function findDoctors(): array
    {
        $doctorTypeId = self::DOCTOR_TYPE_ID;
        $sql = "SELECT id, name FROM ".self::table." WHERE user_type = $doctorTypeId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $userId
     * @return string
     */
    public function updateImg(int $userId): string
    {
        $validExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        $targetDir = 'upload_images/';

        $ext = explode('.', $_FILES['img']['name'])[1];

        if (in_array($ext, $validExtensions)) {
            $newNameImg = time() . '.' . $ext;

            $targetFile = $targetDir . $newNameImg;

            $imgName = null;
            if (move_uploaded_file($_FILES['img']['tmp_name'], $targetFile)) {
                $imgName = $newNameImg;
            } else {
                $targetFile = '';
            }

            $sql  = "UPDATE ". self::table ." SET img_name = '$imgName' WHERE id= $userId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $targetFile = '';
        }

        return $targetFile;
    }

    /**
     * @param int $userId
     *
     * @return array
     */
    public function getImageByUserId(int $userId): array
    {
        $sql = "SELECT img_name FROM ".self::table." WHERE id = $userId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
