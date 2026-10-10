<?php
namespace App\Core;

use PDO;

/**
 * Base Abstract Model with Common PDO Operations
 */
abstract class Model
{
    protected string $table;
    protected string $primaryKey = 'id';
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function all(string $orderBy = 'id DESC', int $limit = 0, int $offset = 0): array
    {
        $sql = "SELECT * FROM `{$this->table}` ORDER BY $orderBy";
        if ($limit > 0) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->table}` WHERE `{$this->primaryKey}` = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function findBy(string $column, $value): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM `{$this->table}` WHERE `$column` = :val LIMIT 1");
        $stmt->execute(['val' => $value]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function where(array $conditions, string $orderBy = 'id DESC', int $limit = 0, int $offset = 0): array
    {
        $clauses = [];
        $params = [];
        foreach ($conditions as $col => $val) {
            $paramName = 'p_' . preg_replace('/[^a-zA-Z0-9_]/', '', $col);
            $clauses[] = "`$col` = :$paramName";
            $params[$paramName] = $val;
        }

        $whereSql = !empty($clauses) ? "WHERE " . implode(" AND ", $clauses) : "";
        $sql = "SELECT * FROM `{$this->table}` $whereSql ORDER BY $orderBy";
        if ($limit > 0) {
            $sql .= " LIMIT $limit OFFSET $offset";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function count(array $conditions = []): int
    {
        $clauses = [];
        $params = [];
        foreach ($conditions as $col => $val) {
            $paramName = 'p_' . preg_replace('/[^a-zA-Z0-9_]/', '', $col);
            $clauses[] = "`$col` = :$paramName";
            $params[$paramName] = $val;
        }

        $whereSql = !empty($clauses) ? "WHERE " . implode(" AND ", $clauses) : "";
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM `{$this->table}` $whereSql");
        $stmt->execute($params);
        $res = $stmt->fetch();
        return (int)($res['total'] ?? 0);
    }

    public function create(array $data): int
    {
        $columns = array_keys($data);
        $fields = implode("`, `", $columns);
        $placeholders = ":" . implode(", :", $columns);

        $sql = "INSERT INTO `{$this->table}` (`$fields`) VALUES ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);

        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $setParts = [];
        foreach ($data as $col => $val) {
            $setParts[] = "`$col` = :$col";
        }
        $data['id'] = $id;

        $sql = "UPDATE `{$this->table}` SET " . implode(", ", $setParts) . " WHERE `{$this->primaryKey}` = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM `{$this->table}` WHERE `{$this->primaryKey}` = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function rawQuery(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
