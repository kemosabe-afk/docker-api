<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../connection/database.php';
    include_once '../class/employees.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Employee($db);
    $stmt = $items->getEmployees();
    $itemCount = $stmt->num_rows;

    if($itemCount > 0){

        $userArr = array();
        while ($row = $stmt->fetch_assoc()) {
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "designation" => $designation,
                "created" => $created,
            );
            array_push(
                    $userArr, $e);
        }
        echo json_encode($userArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>
