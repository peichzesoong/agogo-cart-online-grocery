<?php
    
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = "OnlineGroceryLatest";

    $con = mysqli_connect($host, $user, $password, $database);

    if(!isset($con)){
        die("Connection Failed: ".mysqli_connect_error());
    }
    // echo "Congratulations! ^o^";

    function getData($table = 'product'){
        $sql = "SELECT * FROM {$table}";
        global $con;
        $result = mysqli_query($con, $sql);
        $resultArray = array();


        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    
    function filterData($sql){        
        global $con;
        $result = mysqli_query($con, $sql);
        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    function insertData($sql){        
        global $con;
        
        if ($con->query($sql) === TRUE) {
            // echo "Congratulations, cart added";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        };
    }

?>