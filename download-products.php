<?php
    include('database/connection.php');
    $table = 'products';

        // Consultar datos de la tabla
        $stmt = $conn->query("SELECT * FROM $table");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($rows) === 0) {
            throw new Exception("No hay datos en la tabla.");
        }
    
        // Encabezados para descargar como archivo Excel
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"products.xls\"");
    
        // Estilos para la tabla
        $styles = "
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                    font-family: Times New Roman, Times, serif;
                }
                th, td {
                    border: 1px solid #000;
                    text-align: left;
                    padding: 8px;
                }
                th {
                    background-color:rgb(27, 147, 239);
                    font-weight: bold;
                    color: #333;
                }
                tr:nth-child(even) {
                    background-color:rgb(179, 179, 179);
                }
                tr:hover {
                    background-color:rgb(223, 223, 223);
                }
            </style>
        ";
    
        // Generar tabla con estilos
        echo $styles;
        echo "<table>";
        
        // Encabezados
        echo "<tr>";
        foreach (array_keys($rows[0]) as $column) {
            echo "<th>" . htmlspecialchars($column) . "</th>";
        }
        echo "</tr>";
    
        // Filas
        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
    
        echo "</table>";
        exit;    
?>
