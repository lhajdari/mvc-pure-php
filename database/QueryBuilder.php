<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($table, $parameters)
    {
        // sprintf => declare string with placeholders
        $sql = sprintf('insert into %s (%s) values (%s)', $table, implode(', ', array_keys($parameters)), ':'.implode(', :',array_keys($parameters)));

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Throwable $th) {
            header('Location: 404.php');
        }
    }

    public function select($table, $parameters)
    {
      $sql = sprintf('select %s from %s', implode(', ', array_values($parameters)), $table);
      try {
          $statement = $this->pdo->prepare($sql);
          $statement->execute($parameters);
          return $statement->fetchAll(PDO::FETCH_OBJ);
      } catch (\Throwable $th) {
          header('Location: 404.php');
      }
    }

    public function selectWhere($table, $parameters, $condition)
    {
      $sql = sprintf('select %s from %s where %s = %s', implode(', ', array_values($parameters)), $table, array_keys($condition), array_values($condition));
      try {
          $statement = $this->pdo->prepare($sql);
          $statement->execute($parameters);
          return $statement->fetchAll(PDO::FETCH_OBJ);
      } catch (\Throwable $th) {
          header('Location: 404.php');
      }
    }
}
