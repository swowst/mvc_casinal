<?php

namespace Core;

use PDO;

class DB
{
    private const ACTION_SELECT = 'select';
    private const ACTION_UPDATE = 'update';
    private const ACTION_CREATE = 'create';
    private const ACTION_DELETE = 'delete';
    protected PDO $db;
    protected string $table = '';
    private string $select = '*';
    private string $sql = '';
    private string $currentAction = '';
    private ?int $limit = null;
    private ?int $offset = null;
    private bool $multiple = false;

    private array $where = [];

    private array $params = [];

    private array $updateData = [];
    private array $insertData = [];

    private function setAction(string $action): void
    {
        $this->currentAction = $action;
    }

    private function setMultiple(bool $multiple): void
    {
        $this->multiple = $multiple;
    }

    public function __construct()
    {
        if (
            !defined('DB_HOST') ||
            !defined('DB_NAME') ||
            !defined('DB_USERNAME') ||
            !defined('DB_PASSWORD')
        ) {
            throw new \Exception("Please defined credentials");
        }
        try {
            $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";", DB_USERNAME, DB_PASSWORD);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function reset(): void
    {
        $this->multiple = false;
        $this->limit = null;
        $this->offset = null;
        $this->select = '*';
        $this->currentAction = '';
        $this->sql = '';
        $this->params = [];
        $this->where = [];
        $this->updateData = [];
        $this->insertData = [];
    }

    private function buildQuery(): void
    {
        switch ($this->currentAction) {
            case self::ACTION_SELECT:
                $this->buildSelect();
                break;
            case self::ACTION_CREATE:
                $this->buildCreate();
                break;
            case self::ACTION_UPDATE:
                $this->buildUpdate();
                break;
            case self::ACTION_DELETE:
                $this->buildDelete();
                break;
            default:
                throw new \Exception("Please select database action");
        }
    }

    public function buildDelete(): void
    {
        $this->sql = 'Delete from ' . $this->table;
        $this->handleWhere();
    }

    public function buildUpdate(): void
    {
        $this->sql = 'Update ' . $this->table . ' set ';
        $this->handleUpdateData();
        $this->handleWhere();
    }

    public function buildCreate($data): void
    {
        $this->insertData =$data;
        $this->sql = 'Insert into ' . $this->table;
        $this->handleInsertData();
    }


    public function handleInsertData(): void
    {

        if ($this->insertData) {
            $this->sql .= ' (';
            foreach ($this->insertData as $columnName => $value) {
                $this->sql .= $columnName . ',';
                $this->params[] = $value;
            }
            $this->sql = rtrim($this->sql, ',');
            $questionMarks = rtrim(str_repeat('?,', count($this->insertData)), ',');
            $this->sql .= ') values (' . $questionMarks . ')';

        }


        $query = $this->db->prepare($this->sql);
        $res = $query->execute($this->params);

    }

    public function handleUpdateData(): void
    {
        if ($this->updateData) {
            foreach ($this->updateData as $columnName => $value) {
                $this->sql .= $columnName . ' = ? ,';
                $this->params[] = $value;
            }
            $this->sql = rtrim($this->sql, ',');
        }
    }

    private function buildSelect(): void
    {
        $this->sql = 'Select ' . $this->select . ' from ' . $this->table;
        $this->handleWhere();
        $this->handleLimit();
    }

    public function handleWhere(): void
    {
        if ($this->where) {
            foreach ($this->where as $index => $where) {
                if ($index == 0) {
                    $this->sql .= ' where ';
                } else {
                    $this->sql .= 'and ';
                }
                $this->sql .= $where['columnName'];
                $this->sql .= ' ' . $where['operator'] . ' ? ';
                $this->params[] = $where['value'];

            }
        }
    }

    public function handleLimit(): void
    {
        if ($this->limit) {
            if ($this->offset) {
                $this->sql .= ' limit ' . $this->offset . ',' . $this->limit;
            } else {
                $this->sql .= ' limit ' . $this->limit;
            }
        }
    }

    private function runQuery(): mixed
    {
        if (!$this->sql) {
            die('Not sql exception');
        }

        try {
            $result = false;
            $query = $this->db->prepare($this->sql);
            $res = $query->execute($this->params);
            switch ($this->currentAction) {
                case self::ACTION_SELECT:
                    if ($this->multiple) {
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                    }
                    return $result;
                case self::ACTION_CREATE:
                    return $result;
                case self::ACTION_UPDATE:
                    return $res;
                case self::ACTION_DELETE:
                    return $result;
                default:
                    return $result;
            }
        } catch (\Exception $e) {
            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
            return $result;
        }
    }

    public function first(): array|string
    {
        $this->setAction(self::ACTION_SELECT);
        $this->setMultiple(false);
        $this->buildQuery();
        $res = $this->runQuery();
        $this->reset();
        return $res;
    }

    public function all(): array|string
    {
        $this->setAction(self::ACTION_SELECT);
        $this->setMultiple(true);
        $this->buildQuery();
        $res = $this->runQuery();
        $this->reset();
        return $res;
    }

    public function select($columns = ['*']): self
    {
        $this->select = implode(',', $columns);
        return $this;
    }

    public function where(string $columnName, $value, $operator = '='): self
    {
        $this->where[] = [
            'columnName' => $columnName,
            'operator' => $operator,
            'value' => $value
        ];
        return $this;
    }

    public function limit(int $limit = 1): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset = 1): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function update(array $updateData): bool
    {
        $this->updateData = $updateData;

        $this->setAction(self::ACTION_UPDATE);
        $this->buildQuery();
        $res = boolval($this->runQuery());
        $this->reset();
        return $res;
    }

    public function insert(array $insertData): bool
    {
        $this->insertData = $insertData;

        $this->setAction(self::ACTION_CREATE);
        $this->buildQuery();
        $res = boolval($this->runQuery());
        $this->reset();
//        return $res;
    }

    public function delete(): bool
    {
        $this->setAction(self::ACTION_DELETE);
        $this->buildQuery();
        $res = boolval($this->runQuery());
        $this->reset();
        return $res;
    }

}