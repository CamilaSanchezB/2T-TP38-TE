<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos humanos</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <?php
    include 'conexion.php';
    $pais=ucfirst(strtolower($_REQUEST['pais']));
    mysqli_query($conexion, "insert into personas(ApellidoPersona,NombrePersona,DniPersona,FnacPersona,EmailPersona,MovilPersona,GithubPersona,LinkedinPersona, PaisPersona) values 
    ('$_REQUEST[apellido]','$_REQUEST[nombre]', '$_REQUEST[dni]',' $_REQUEST[fnac]','$_REQUEST[email]', '$_REQUEST[movil]', '$_REQUEST[github]', '$_REQUEST[linkedin]', '$pais')")
    or die("Problemas en el select" . mysqli_error($conexion));
    $registros= mysqli_query($conexion, "select * from personas") or
    die("Problemas en el select:" . mysqli_error($conexion));
      echo "<main role='main' class='container pt-3'>
      <div class='display-3 font-italic'>
          Personal
      </div>
      <h1 >Muestra de datos</h1>
      <h4 class='pb-3'>Ingreso de nuevo registro</h4>
        <div class='row justify-content-center pt-4'>
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
    echo "      </tbody>
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