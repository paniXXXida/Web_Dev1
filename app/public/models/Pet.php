<?php

namespace models;
use PDO;
require_once(__DIR__ . "/Model.php");
class Pet extends Model
{
    public const table = 'pets';

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByUserId(int $id): array
    {
        $sql = "SELECT id, name, type, year FROM ".self::table." WHERE user_id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function create(array $data): bool
    {
        $name = $data['pet_name'];
        $type = $data['pet_type'];
        $year = $data['pet_year'];
        $userid = $_SESSION['user']['id'];

        $sql = "INSERT INTO ".self::table."(name, user_id, type, year)
				VALUES (:name, :user_id, :type, :year)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":user_id", $userid);
        $stmt->bindValue(":type", $type);
        $stmt->bindValue(":year", $year);

        return $stmt->execute();
    }
}