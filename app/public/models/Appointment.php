<?php


namespace models;
use PDO;

require_once(__DIR__ . "/Model.php");
class Appointment extends Model
{
    const table = 'doctor_appointments';

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
        // Проверка наличия необходимых полей
        if (empty($data['id']) || empty($data['date'])) {
            error_log('Missing id or date in update.');
            return false;
        }

        $sql = "UPDATE " . self::table . " SET date = :date WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':date', $data['date'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);

        try {
            $result = $stmt->execute();
            error_log("Execute result for appointment ID {$data['id']}: " . ($result ? 'Success' : 'Failure'));

            if ($result && $stmt->rowCount() > 0) {
                error_log("Appointment ID {$data['id']} updated successfully.");
                return true;
            } else {
                error_log("No rows updated for appointment ID: {$data['id']}.");
                return false;
            }
        } catch (\PDOException $e) {
            error_log('PDOException in update: ' . $e->getMessage());
            return false;
        }
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