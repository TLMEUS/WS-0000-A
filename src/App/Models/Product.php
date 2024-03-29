<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Product extends Model
{
    protected string $table = "products";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {
            
            $this->addError("name", "Name is required");

        }
    }

    public function getTotal(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM products";

        $conn = $this->database->getConnection();

        $stmt = $conn->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row["total"];
    }
}