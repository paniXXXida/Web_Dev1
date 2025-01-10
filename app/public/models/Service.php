<?php

namespace models;
require_once(__DIR__ . "/Model.php");
class Service extends Model
{
    public const table = 'doctor_services';

    /**
     * @param array $data
     *
     * @return bool
     */
    public function create(array $data): bool
    {
        $doctorId = $data['doctor_id'];
        $name     = $data['service_name'];

        $sql = "INSERT INTO ".self::table." (user_id, name)
				VALUES (:user_id, :name)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":user_id", $doctorId);
        $stmt->bindValue(":name", $name);

        return $stmt->execute();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByDoctorId(int $id): array
    {
        $sql = "SELECT * FROM ".self::table." WHERE user_id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function update(array $data): bool
    {
        $id   = $data['service_id'];
        $name = $data['service_name'];

        $sql  = "UPDATE ".self::table." SET name = '$name' WHERE id= $id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }
}