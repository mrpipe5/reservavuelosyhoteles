<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM RESERVA";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id_reserva: " . $row["id_reserva"]. " - id_cliente: " . $row["id_cliente"]. " - fecha_reserva: " . $row["fecha_reserva"]. " - id_vuelo: " . $row["id_vuelo"]. " - id_hotel: " . $row["id_hotel"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
