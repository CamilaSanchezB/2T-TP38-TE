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
    echo "<main role='main' class='container pt-3'>
    <div class='display-3 font-italic'>
        Personal 
    </div>
    <h1>Muestra de datos</h1>
    <h4 class='pb-3'>Modificación de registro</h4> 
    <p class='lead'>Se modificó a la persona #",$_REQUEST['idP1'],"</p>"; 
  
    $registros = mysqli_query($conexion, "select * from personas
    where IdPersona='$_REQUEST[idP]'") or
die("Problemas en el select:" . mysqli_error($conexion));
    if (isset($_POST['nombrePV']) && isset($_POST['nombrePN'])){ 
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set NombrePersona='$_REQUEST[nombrePN]' 
                        where IdPersona='$_REQUEST[idP]' and NombrePersona='$_REQUEST[nombrePV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        }} 
    else echo " ERROR: Nombre incorrecto";
    if (isset($_POST['apellidoPV']) && isset($_POST['apellidoPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
        where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set ApellidoPersona='$_REQUEST[apellidoPN]' 
                        where IdPersona='$_REQUEST[idP]' and ApellidoPersona='$_REQUEST[apellidoPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
        
    }else echo "ERROR: Apellido incorrecto";
    if (isset($_POST['dniPV']) && isset($_POST['dniPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set DniPersona='$_REQUEST[dniPN]' 
                        where IdPersona='$_REQUEST[idP]' and DniPersona='$_REQUEST[dniPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: DNI incorrecto";
    if (isset($_POST['fnacPV']) && isset($_POST['fnacPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
        where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set FnacPersona='$_REQUEST[fnacPN]' 
                        where IdPersona='$_REQUEST[idP]' and FnacPersona='$_REQUEST[fnacPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: FNAC incorrecta";
    if (isset($_POST['emailPV']) && isset($_POST['emailPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set EmailPersona='$_REQUEST[emailPN]' 
                        where IdPersona='$_REQUEST[idP]' and EmailPersona='$_REQUEST[emailPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: EMAIL incorrecto";
    if (isset($_POST['movilPV']) && isset($_POST['movilPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set MovilPersona='$_REQUEST[movilPN]' 
                        where IdPersona='$_REQUEST[idP]' and MovilPersona='$_REQUEST[movilPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: MOVIL incorrecto";
    if (isset($_POST['githubPV']) && isset($_POST['githubPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set GithubPersona='$_REQUEST[githubPN]' 
                        where IdPersona='$_REQUEST[idP]' and GithubPersona='$_REQUEST[githubPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: GITHUB incorrecto";
    if (isset($_POST['linkedinPV']) && isset($_POST['linkedinPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set LinkedinPersona='$_REQUEST[linkedinPN]' 
                        where IdPersona='$_REQUEST[idP]' and LinkedinPersona='$_REQUEST[linkedinPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: LINKEDIN incorrecto";
    if (isset($_POST['paisPV']) && isset($_POST['paisPN'])){ 
        $registros = mysqli_query($conexion, "select * from personas
            where IdPersona='$_REQUEST[idP]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        if ($reg = mysqli_fetch_array($registros)) {
            mysqli_query($conexion, "update personas
                        set PaisPersona='$_REQUEST[paisPN]' 
                        where IdPersona='$_REQUEST[idP]' and PaisPersona='$_REQUEST[paisPV]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        } 
    }else echo " ERROR: PAIS incorrecto";
    echo "
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
    $registros= mysqli_query($conexion, "select * from personas") or die("Problemas en el select:" . mysqli_error($conexion));
    while ($reg = mysqli_fetch_array($registros)) {
    echo "
        <tr>
            <td>". $reg['IdPersona'] . "</td>
            <td>". $reg['ApellidoPersona'] ."</td>
            <td>". $reg['NombrePersona'] ."</td>
            <td>". date_format(date_create($reg['FnacPersona']),'d/m/Y')  ."</td>
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