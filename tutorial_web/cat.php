<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Fatal Error");
    
    // $query = "CREATE TABLE cats (
    //     id SMALLINT NOT NULL AUTO_INCREMENT,
    //     family VARCHAR(32) NOT NULL,
    //     name VARCHAR(32) NOT NULL,
    //     age TINYINT NOT NULL,
    //     PRIMARY KEY (id)
    // )";

    // $result = $conn->query($query);
    // if (!$result) die ("Database access failed");

    $query = "DESCRIBE cats";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");

    $rows = $result->num_rows;

    echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

    for ($j = 0; $j < $rows; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

        echo "<tr>";
        for ($k = 0; $k < 4; ++$k)
            echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // insert values
    $query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";
    $result = $conn->query($query);
    $query = "INSERT INTO cats VALUES(NULL, 'Cougar', 'Growler', 2)";
    $result = $conn->query($query);
    $query = "INSERT INTO cats VALUES(NULL, 'Cheetah', 'Charly', 3)";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");

    $query = "UPDATE cats SET name='Charlie' WHERE name='Charly'";
    $result = $conn->query($query);
    if (!$result) die ("Database access failed");

    // // delete data
    // $query = "DELETE FROM cats";
    // $result =$conn->query($query);
    // if (!$result) die ("Database access failed");

    // retrieving data
    $query = "SELECT * FROM cats";
    $result =$conn->query($query);
    if (!$result) die ("Database access failed");

    $rows = $result->num_rows;
    echo "<table><tr> <th>Id</th> <th>Family</th><th>Name</th><th>Age</th></tr>";

    for ($j = 0; $j < $rows; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

        echo "<tr>";
        for ($k = 0; $k < 4; ++$k)
            echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";



?>
