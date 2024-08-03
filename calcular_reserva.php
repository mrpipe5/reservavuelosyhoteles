<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
SELECT h.nombre_hotel, COUNT(r.id_reserva) AS num_reservas
FROM HOTEL h
JOIN RESERVA r ON h.id_hotel = r.id_hotel
GROUP BY h.id_hotel
HAVING num_reservas > 2
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hoteles con más de dos reservas</title>
</head>
<body>

<h1>Hoteles con más de dos reservas</h1>

<?php
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Hotel</th><th>Numero de Reservas</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nombre_hotel"]. "</td><td>" . $row["num_reservas"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hotels found with more than two reservations.";
}

$conn->close();
?>

</body>
</html>
