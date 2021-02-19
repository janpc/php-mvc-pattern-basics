<?php

function getAll(){
    $data = null;

    /* initialize mysli */
    $database = new mysqli("localhost", "root", "", "php-mvc-pattern-basics");

    /* Check posible errors */
    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: (" . $database->connect_errno . ") " . $database->connect_error;
    }

    /* Consultas de selección que devuelven un conjunto de resultados */
    if ($result = $database->query("SELECT * FROM employees LIMIT 10")) {

        $data = $result;

    }

    $database->close();

    return $data;

}

function getById($id){
}