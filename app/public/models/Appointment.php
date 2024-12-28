<?php

namespace Models;

class Appointment extends Model
{
    public const table = 'doctor_appointments';

    /**
     * @param array $data
     *
     * @return bool
     */
    public function create(array $data): bool
    {
        $doctorId    = $data['doctor_id'];
        $userId      = $_SESSION['user']['id'];
        $petId       = $data['pet_id'];
        $description = $data['description'];
        $date        = empty($data['date']) ? null : $data['date'];

        $sql = "INSERT INTO ".self::table." (doctor_id, user_id, pet_id, description, date)
				VALUES (:doctor_id, :user_id, :pet_id, :description, :date)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":doctor_id", $doctorId);
        $stmt->bindValue(":user_id", $userId);
        $stmt->bindValue(":pet_id", $petId);
        $stmt->bindValue(":description", $description);
        $stmt->bindValue(":date", $date);

        return $stmt->execute();
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function update(array $data): bool
    {
        $date = $data['date'];
        $id   = $data['id'];

        $sql = "UPDATE ".self::table." SET date = '$date' WHERE id= $id";
        $stmt= $this->pdo->prepare($sql);

        return $stmt->execute();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByDoctorId(int $id): array
    {
        $sql = "SELECT doctor_appointments.id, users.name, users.phone, doctor_appointments.description, doctor_appointments.date, pets.type FROM ".self::table." 
            JOIN users ON users.id = doctor_appointments.user_id
                 JOIN pets ON pets.id = doctor_appointments.pet_id
        WHERE doctor_id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id): array
    {
        $sql = "SELECT * FROM ".self::table." WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByUserId(int $id): array
    {
        $sql = "SELECT doctor_appointments.id, doctor_appointments.description, pets.type, doctor_appointments.date FROM ".self::table."
             JOIN pets ON pets.id = doctor_appointments.pet_id
                WHERE doctor_appointments.user_id = $id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function deleteById(int $id): bool
    {
        $sql  = "DELETE FROM ".self::table." WHERE id= $id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }
}