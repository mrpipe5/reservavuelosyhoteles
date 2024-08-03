<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Datos de reserva
$reservas = [
    [1, '2024-07-20', 1, 1],
    [2, '2024-07-21', 2, 2],
    [3, '2024-07-22', 3, 3],
    [4, '2024-07-23', 1, 2],
    [5, '2024-07-24', 2, 1],
    [6, '2024-07-25', 3, 3],
    [7, '2024-07-26', 1, 1],
    [8, '2024-07-27', 2, 3],
    [9, '2024-07-28', 3, 2],
    [10, '2024-07-29', 1, 1]
];

foreach ($reservas as $reserva) {
    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES ($reserva[0], '$reserva[1]', $reserva[2], $reserva[3])";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro agregado exitosamente<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
