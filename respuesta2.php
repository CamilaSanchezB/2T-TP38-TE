<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body>
    <?php
    include 'conexion.php';
    $registros = mysqli_query($conexion, "select * from personas where IdPersona='$_REQUEST[idP1]'") or
    die("Problemas en el select:" . mysqli_error($conexion));
    echo "<main role='main' class='container pt-3'>
            <div class='display-3 font-italic'>
                Personal
            </div>
            <h1>Muestra de datos</h1>
            <h4 class='pb-3'>Eliminar registro</h4>
            <p class='lead'>";
  if ($reg = mysqli_fetch_array($registros)) {
    mysqli_query($conexion, "delete from personas where personas.IdPersona = '$_REQUEST[idP1]'") or
      die("Problemas en el select:" . mysqli_error($conexion));
    echo "Se eliminó a la persona #",$_REQUEST['idP1'],"</p>";
  } else {
    echo "ERROR</p>";
  }
  echo "<div class='row justify-content-center pt-4'>
            <div class='col-md-10'>
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <thead class='table-info'>
                            <tr>
                                <th>#</th>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Fecha nacimiento</th>
                                <th>Email</th>
                                <th>Movil</th>
                                <th>DNI</th>
                                <th>Github</th>
                                <th>Linkedin</th>
                                <th>País</th>
                            </tr>
                        </thead>
                        <tbody>";
    $registros = mysqli_query($conexion, "select * from personas") or
    die("Problemas en el select:" . mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros)) {
      echo "<tr>
            <td>". $reg['IdPersona'] . "</td>
            <td>". $reg['ApellidoPersona'] ."</td>
            <td>". $reg['NombrePersona'] ."</td>
            <td>". $reg['FnacPersona'] ."</td>
            <td>". $reg['EmailPersona'] ."</td>
            <td>". $reg['MovilPersona'] ."</td>
            <td>". $reg['DniPersona'] ."</td>
            <td>". $reg['GithubPersona'] ."</td>
            <td>". $reg['LinkedinPersona'] ."</td>
            <td>". $reg['PaisPersona'] ."</td>
        </tr>";
    }
    echo "              </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='row justify-content-center m-0'>
            <div class='col-sm-3 text-center pt-4'>
                <div class='form-group'>
                    <a class='btn btn-info btn-block' href='index.php#menu1'>
                        Volver
                    </a>
                </div>
            </div>
        </div>";
mysqli_close($conexion);    
?>
</body>
</html>