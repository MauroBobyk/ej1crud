<?php
include 'conexion.php';
include 'index.php';

// Obtener todos los productos
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();
?>
<head> <link href="styles.css" rel="stylesheet" type="text/css"> </head>
<h1>Lista de Productos</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Artículo</th>
        <th>Descripción</th>
        <th>Unidades Disponibles</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
    <tr>
        <td><?= $producto['id'] ?></td>
        <td><?= $producto['articulo'] ?></td>
        <td><?= $producto['descripcion'] ?></td>
        <td><?= $producto['unidades_disponibles'] ?></td>
        <td>
            <form method="POST" action="eliminar.php" style="display:inline;">
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <form method="POST" action="modificar.php" style="display:inline;">
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                <button type="submit" class="btn btn-warning">Modificar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>