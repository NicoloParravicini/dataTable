<?php

    function countRecord(){
        require('db.php');
        $query = "SELECT COUNT(*)  FROM employees";
        $result = $mysqli->query($query);
        $row= $result-> fetch_array();
        return $row[0];
    }

    function GET($first, $lenght){
        require('db.php');
        $query = "SELECT * FROM employees ORDER BY id LIMIT $first, $lenght";
        $result = $mysqli->query($query);
        $rows = array();
        while ($row= $result-> fetch_assoc()) {
            $rows[]=$row;
        }
        return $rows;
    }

    function POST($birth_date, $first_name, $last_name, $gender){
        require('db.php');
        $query = "INSERT INTO employees(birth_date, first_name, last_name, gender)
                VALUES ('$birth_date', '$first_name', '$last_name', '$gender')";
        $result = $mysqli->query($query);
    }

    function DELETE($id){
        require('db.php');
        $query = "DELETE FROM employees
                WHERE employees.id=$id";
        $result = $mysqli->query($query);
    }

    function PUT($id, $birth_date, $first_name, $last_name, $gender){
        require('db.php');
        $query = "UPDATE employees
                SET birth_date='$birth_date', first_name='$first_name', last_name='$last_name', gender='$gender'
                WHERE employees.id=$id";
        $result = $mysqli->query($query);
    }

?>