<?php

function db()
{
    return new QueryBuilder(Connection::make());
}

function view($name, $data = null)
{
    extract($data);
    return require "views/{$name}.view.php";
}

function redirect($path, $data = null)
{
    if ($data !== null) {
        header("Location: /newCo/{$path}?error={$data}");
    } else {
      header("Location: /newCo/{$path}");
    }
}
