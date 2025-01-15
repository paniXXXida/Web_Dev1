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


}
