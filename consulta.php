<!DOCTYPE html>
<html>
<head>
    <title>Hoteles con Más de Dos Reservas</title>
</head>
<body>
    <h1>Hoteles con Más de Dos Reservas</h1>
    <?php
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "agencia";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta avanzada para contar las reservas por hotel
    $sql = "
    SELECT h.id_hotel, h.nombre, COUNT(r.id_reserva) AS num_reservas
    FROM HOTEL h
    JOIN RESERVA r ON h.id_hotel = r.id_hotel
    GROUP BY h.id_hotel
    HAVING num_reservas > 2;
    ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos de los hoteles
        echo "<table border='1'>
                <tr>
                    <th>ID Hotel</th>
                    <th>Nombre</th>
                    <th>Número de Reservas</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_hotel"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["num_reservas"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron hoteles con más de dos reservas.";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
