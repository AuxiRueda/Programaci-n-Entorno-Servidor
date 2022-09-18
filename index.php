<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="almacen2.css" />

    <title>Almacenes Rueda</title>
</head>
<body>

        <h1 class="splash-head">Almacenes Rueda</h1>
        <h2>Gestión de Producto</h2>

    <?php
    $conexion = mysqli_connect("localhost","root","","tiendas");//conexión a la base de dato, usuaio y contraseña y bbdd


    $_GET ['accion'] = isset($_GET['accion']) ? $_GET['accion'] : null;

    //Dar de baja de un producto
    if ($_GET ['accion'] == 'borrar') {
         $altaSql=mysqli_query($conexion, "DELETE FROM producto WHERE Codproducto=".$_GET['Codproducto']);
    }

    //Modificar  un producto
        if ($_GET['accion'] == 'modificar') {
            //echo "hola";
            $modificacionSql= "UPDATE producto ".
             "SET Codproducto='" . $_GET['Codproducto'] .
             "', productro='" . $_GET['producto'] .
             "', stock='" . $_GET['stock'] .
             "', precio='" . $_GET['precio'] .
             "', iva='" . $_GET['iva'] .
             "', Codalmacen='".$_GET['Codalmacen'].
             "' WHERE Codproducto='" . $_GET['CodproductoAntiguo'] . "'";
            echo $modificacionSql;
             mysqli_query($conexion, $modificacionSql);

             
       }
   
    //Dar de alta un producto
    if ($_GET ['accion'] == 'crear') {

    $altaSql = "INSERT INTO producto VALUES ('".$_GET['Codproducto']."','".$_GET['producto']."','".$_GET['stock']."','".$_GET['precio']."','".$_GET['iva']."','".$_GET['Codalmacen']."')";
    //echo $altaSql;
    mysqli_query($conexion, $altaSql);

    }

    

    //listado
    $listadoSql = "SELECT Codproducto, productro, stock, precio, iva, Codalmacen FROM producto";
    if ($_GET ['accion'] == 'ordenar') {
        $listadoSql = "$listadoSql ORDER BY Codproducto";
    }
    if ($_GET ['accion'] == 'ordenar1') {
        $listadoSql = "$listadoSql ORDER BY productro";
    }
    if ($_GET ['accion'] == 'ordenar2') {
        $listadoSql = "$listadoSql ORDER BY stock";
    }
    if ($_GET ['accion'] == 'ordenar3') {
        $listadoSql = "$listadoSql ORDER BY precio";
    }
    if ($_GET ['accion'] == 'ordenar4') {
        $listadoSql = "$listadoSql ORDER BY iva";
    }
    if ($_GET ['accion'] == 'ordenar5') {
        $listadoSql = "$listadoSql ORDER BY Codalmacen";
    }

    $consulta = mysqli_query($conexion, $listadoSql);

    ?>

    <table class="pure-table">
        <tr>
            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar">
            <button class="pure-button pure-button-primary">Código Producto</button> </a></th>

            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar1">
            <button class="pure-button pure-button-primary">Producto</button> </a></th>

            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar2">
            <button class="pure-button pure-button-primary">Stock</button> </a></th>

            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar3">
            <button class="pure-button pure-button-primary">Precio</button> </a></th>

            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar4">
            <button class="pure-button pure-button-primary">IVA</button> </a></th>

            <th><a class="pure-button pure-button-primary" href="index.php?accion=ordenar5">
            <button class="pure-button pure-button-primary">Almacén</button></a></th>


            <th></th>
        </tr>
       
            <form action="index.php" method="GET">
        <tr>
             <td><input type="text" name="Codproducto"></td>
             <td><input type="text" name="producto"></td>
            <td><input type="text" name="stock"></td>
             <td><input type="text" name="precio"></td>
             <td><input type="text" name="iva"></td>
             <!--<td><input type="text" name="Codalmacen"></td> lo sustituyo-->
             <td><select name ="Codalmacen" id="almacen">
                <option value="1">Almacén ropa</option>
                <option value="2">Almacén calzado</option>
                <option value="3">Almacén comida</option>

             </select></td>


                <input type="hidden" name="accion" value="crear">
                <td><input type="submit" value="Añadir"></td>
          
             
         </tr>
        </form>
        <?php
            while ($registro = mysqli_fetch_array($consulta)) {
        ?>
            
            <tr>
                <td><?=$registro['Codproducto'] ?></td>
                <td><?=$registro['productro'] ?></td>
                <td><?=$registro['stock'] ?></td>
                <td><?=$registro['precio'] ?></td>
                <td><?=$registro['iva'] ?></td>
                <td><?=$registro['Codalmacen'] ?></td>
                
                <td>

                <a class="pure-button pure-button-primary" href="modificar.php?&Codproducto=<?= $registro['Codproducto'] ?> &productro=<?= $registro['productro'] ?> &stock=<?= $registro['stock'] ?> &precio=<?= $registro['precio'] ?> &iva=<?=$registro['iva'] ?> &Codalmacen=<?=$registro['Codalmacen'] ?>">
                    <button class="pure-button pure-button-primary">Modificar</button>
                </a>
                </td>
                <td>
                <a class="pure-button pure-button-primary" href="index.php?accion=borrar&Codproducto=<?= $registro['Codproducto'] ?>">


                <a class="pure-button pure-button-primary" href="index.php?accion=borrar&Codproducto=<?= $registro['Codproducto'] ?>">
                    <button class="pure-button pure-button-primary">X</button>
                </a>
                </td>
            </tr>
 <?php
    }
?>

</table>
</body>
</html>

