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
<body class="pure-table">
<h1>Almacenes Rueda</h1>
    <h2>Gestión de producto en Almacen</h2>
    <form action="index.php" action="GET">
        <input type="text" name="Codproducto" value="<?= $_GET['Codproducto'] ?>">  
        <input type="text" name="producto" value="<?= $_GET['productro'] ?>">  
        <input type="text" name="stock" value="<?= $_GET['stock'] ?>">  
        <input type="text" name="precio" value="<?= $_GET['precio'] ?>">
        <input type="text" name="iva" value="<?= $_GET['iva'] ?>">
        <select name ="Codalmacen" id="almacen">
                <option value="1">Almacén ropa</option>
                <option value="2">Almacén calzado</option>
                <option value="3">Almacén comida</option>

             </select>


        <input type="hidden" name="CodproductoAntiguo" value="<?= $_GET['Codproducto'] ?>"> 
        <input type="hidden" name="accion" value="modificar">

        <br><br>
            <input class="pure-button pure-button-primary" type="submit" value="Aceptar">
            <a  href="index.php">
                <button class="pure-button pure-button-primary" type="button">Cancelar</button>
            </a>
    </form>
</body>
</html>