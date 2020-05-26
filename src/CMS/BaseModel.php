<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace CMS;

use Ramsey\Uuid\Uuid;

/**
 * Base model for CMS
 * 
 * @category ETL
 * @package  Media
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseModel implements BaseModelInterface
{
    use BaseModelTrait;

    /**
     * Default constructor
     *
     * @param \PDO $pdo PDO
     */
    public function __construct(\PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    /**
     * Single entity 
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function single(string $id): array
    {
        $pdo = $this->_pdo;

        $stmt = $pdo->prepare(
            'SELECT * FROM `:table` '
                . 'WHERE `id` = :id'
        );

        $stmt->bindParam(':table', $this->table);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * List entities
     *
     * @return array
     */
    public function list(): array
    {
        $pdo = $this->_pdo;

        $stmt = $pdo->prepare(
            'SELECT * FROM `:table`'
        );

        $stmt->bindParam(':table', $this->table);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Post entity
     *
     * @param array $data Data
     * 
     * @return array
     */
    public function post(array $data): array
    {
        $pdo = $this->_pdo;

        $stmtColumns = '(%s)';
        $stmtValues = '(%s)';

        $sprintColumns = '';
        $sprintValues = '';

        $data['id'] = Uuid::uuid6();
        foreach ($data as $key => $element) {
            $sprintColumns .= '`' . $key . '`, ';
            $sprintValues .= ':' . $key . ', ';
        }
        $sprintColumns = substr($sprintColumns, 0, strlen($sprintColumns) - 2);
        $stmtColumns = sprintf($stmtColumns, $sprintColumns);

        $sprintValues = substr($sprintValues, 0, strlen($sprintValues) - 2);
        $stmtValues = sprintf($stmtValues, $sprintValues);

        $stmt = $pdo->prepare(
            'INSERT INTO `:table` '
                . $stmtColumns . ' '
                . 'VALUES '
                . $stmtValues
        );

        $stmt->bindValue(':table', $this->table);
        foreach ($data as $key => $element) {
            $stmt->bindValue(':' . $key, $element);
        }
        $stmt->execute();

        return $data;
    }

    /**
     * Update entity
     *
     * @param array  $data Data
     * @param string $id   ID
     * 
     * @return array
     */
    public function update(array $data, string $id): array
    {
        $pdo = $this->_pdo;

        $stmtUpdate = 'SET %s';
        $stmtSprint = '';
        foreach ($data as $key => $element) {
            $stmtSprint .= '`' . $key . '` = :' . $key . ', ';
        }
        $stmtSprint = substr($stmtSprint, 0, strlen($stmtSprint) - 2);
        $stmtUpdate = sprintf($stmtUpdate, $stmtSprint);

        $stmt = $pdo->prepare(
            'UPDATE `:table` '
                . $stmtUpdate . ' '
                . 'WHERE `id` = :id'
        );

        $stmt->bindParam(':id', $id);
        foreach ($data as $key => $element) {
            $stmt->bindValue(':' . $key, $element);
        }

        $stmt->execute();

        $data['id'] = $id;

        return $data;
    }

    /**
     * Delete entity
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function delete(string $id): array
    {
        $pdo = $this->_pdo;

        $stmt = $pdo->prepare(
            'DELETE FROM `:table` '
                . 'WHERE `id` = `:id`'
        );

        $stmt->execute(
            [
                ':table' => $this->table,
                ':id' => $id,
            ]
        );

        return [];
    }
}
