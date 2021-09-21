<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos humanos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/df27aad513.js" crossorigin="anonymous"></script>
    <style>
        .fa-angle-up {transition: all 0.3s ease;}
        .btn-nav-accordion.collapsed .fa-angle-up {transform: rotate(180deg);}
        .chico{font-size: 2.25rem;}
        .title{font-size: 3rem; font-weight: 300; line-height: 1.2;}
    </style>
</head>
<body>
    <?php 
        include 'conexion.php';
        $registros= mysqli_query($conexion, "select * from personas order by IdPersona asc") or
        die("Problemas en el select:" . mysqli_error($conexion));
        $arg= mysqli_query($conexion, "select * from personas where PaisPersona='Argentina'") or
        die("Problemas en el select:" . mysqli_error($conexion));
        $hoy = date('Y-m-d');
        $mayor = date ('Y-m-d',strtotime ('-18 years' , strtotime($hoy)));
        $mayores= mysqli_query($conexion, "select * from personas where FnacPersona<='$mayor'") or
        die("Problemas en el select-mayor:" . mysqli_error($conexion));
    ?>
    <main role="main" class="container pt-3">
        <div class="display-3 font-italic pb-3">
            Personal
        </div>
        <div >
        <ul class="nav nav-tabs pt-2">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#inicio">Visualizar</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu1">Añadir</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu2">Modificar</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu3">Eliminar</a></li>
          </ul>
          <div class="tab-content">
            <div id="inicio" class="container tab-pane active">
                <div id="accordion">
                    <div id="headingOne" class="py-3">
                        <a  class="btn-nav-accordion text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h3 class="d-inline title">Listado completo </h3><i class="fas fa-angle-up chico"></i>                                   
                        </a>
                    </div>
                <div id="collapseOne" data-parent="#accordion" class="show" aria-labelledby="headingOne">
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
                            <tbody>
                                <?php 
                                while ($reg = mysqli_fetch_array($registros)) {
                                    echo "<tr>
                                            <td>". $reg['IdPersona'] . "</td>
                                            <td>". $reg['ApellidoPersona'] ."</td>
                                            <td>". $reg['NombrePersona'] ."</td>
                                            <td>". date_format(date_create($reg['FnacPersona']),'d/m/Y') ."</td>
                                            <td><a href='mailto:". $reg['EmailPersona']."'>" .$reg['EmailPersona']."</a></td>
                                            <td>". $reg['MovilPersona'] ."</td>
                                            <td>". $reg['DniPersona'] ."</td>
                                            <td><a href='". $reg['GithubPersona']."'>" .$reg['GithubPersona']."</a></td>
                                            <td><a href='". $reg['LinkedinPersona']."'>" .$reg['LinkedinPersona']."</a></td>
                                            <td>". $reg['PaisPersona'] ."</td>
                                        </tr>";
                                }?>
                            </tbody>
                        </table>
                    </div><!--Tabla completa-->
                </div><!--TODES-->
                <div id="headingTwo" class="py-3">
                    <a  class="btn-nav-accordion collapsed text-dark" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <h3 class="d-inline title">Personas que viven en Argentina </h3><i class="fas fa-angle-up chico"></i>                                   
                    </a>
                </div>
                <div id="collapseTwo" data-parent="#accordion" class="collapse" aria-labelledby="headingTwo">
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
                            <tbody>
                                <?php 
                                    while ($reg = mysqli_fetch_array($arg)) {
                                        echo "<tr>
                                                <td>". $reg['IdPersona'] . "</td>
                                                <td>". $reg['ApellidoPersona'] ."</td>
                                                <td>". $reg['NombrePersona'] ."</td>
                                                <td>". date_format(date_create($reg['FnacPersona']),'d/m/Y') ."</td>
                                                <td><a href='mailto:". $reg['EmailPersona']."'>" .$reg['EmailPersona']."</a></td>
                                                <td>". $reg['MovilPersona'] ."</td>
                                                <td>". $reg['DniPersona'] ."</td>
                                                <td><a href='". $reg['GithubPersona']."'>" .$reg['GithubPersona']."</a></td>
                                                <td><a href='". $reg['LinkedinPersona']."'>" .$reg['LinkedinPersona']."</a></td>
                                                <td>". $reg['PaisPersona'] ."</td>
                                                </tr>";
                                    }?>
                            </tbody>
                        </table>
                    </div><!--Tabla completa-->
                    </div><!--VIVEN EN ARGENTINA-->
                    <div id="headingThree" class="py-3">
                        <a  class="btn-nav-accordion collapsed text-dark" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            <h3 class=" d-inline title">Mayores de edad </h3><i class="fas fa-angle-up chico"></i>                                   
                        </a>
                    </div>
                    <div id="collapseThree" data-parent="#accordion" class="collapse" aria-labelledby="headingThree">
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
                                <tbody>
                                    <?php 
                                        while ($reg = mysqli_fetch_array($mayores)) {
                                            echo "<tr>
                                            <td>". $reg['IdPersona'] . "</td>
                                            <td>". $reg['ApellidoPersona'] ."</td>
                                            <td>". $reg['NombrePersona'] ."</td>
                                            <td>". date_format(date_create($reg['FnacPersona']),'d/m/Y') ."</td>
                                            <td><a href='mailto:". $reg['EmailPersona']."'>" .$reg['EmailPersona']."</a></td>
                                            <td>". $reg['MovilPersona'] ."</td>
                                            <td>". $reg['DniPersona'] ."</td>
                                            <td><a href='". $reg['GithubPersona']."'>" .$reg['GithubPersona']."</a></td>
                                            <td><a href='". $reg['LinkedinPersona']."'>" .$reg['LinkedinPersona']."</a></td>
                                            <td>". $reg['PaisPersona'] ."</td>
                                            </tr>";
                                        }?>
                                </tbody>
                            </table>
                        </div><!--Tabla completa-->
                    </div><!--MAYORES-->
                </div>
            </div>
            <div id="menu1" class=" tab-pane">
                <h1 class="pt-3">Ingreso de datos</h1>
                <div class="row justify-content-center pt-4">
                    <div class="col-md-10">
                        <form action="respuesta.php" method="POST">
                            <div class="text-center pb-2 display-4">
                                Datos Personales
                            </div>
                            <h5 class="pt-3 pb-2 pl-3">Nombre completo <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                            <div class="row justify-content-center m-0 text-center pb-2">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" maxlength="15" required>
                                  </div>
                                  <div class="col-sm-6">
                                    <input type="text" placeholder="Apellido" name="apellido" maxlength="15" required class="form-control">
                                  </div>
                            </div>
                            
                            <div class="row m-0 pb-2">
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2">Fecha de nacimiento <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="date" name="fnac" required class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">No. de DNI <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="number" class="form-control" placeholder="DNI" name="dni" required>
                                </div>
                            </div>
                            <div class="row m-0 pb-2">
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">País <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="text" placeholder="País" name="pais" required class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="display-4 text-center pt-4">
                                Métodos de contacto 
                            </div>
                            <div class="row m-0 ">
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">Email <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="email" class="form-control" placeholder="email@ejemplo.com" name="email" required>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">Móvil <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="text" placeholder="+54 9 2236807908" name="movil" required class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="display-4 text-center pt-4 pb-2">
                                Otros
                            </div>
                            
                            <div class="row m-0 ">
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">Github <a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5>
                                    <input type="url" class="form-control" placeholder="Github" name="github" required>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="pt-3 pb-2 ">Linkedin</h5>
                                    <input type="url" placeholder="Linkedin" name="linkedin" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center m-0">
                                <div class="col-sm-3 text-center pt-5">
                                    <div class="form-group">
                                        <button class="btn btn-info btn-block" type="submit">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
            <div id="menu3" class="container tab-pane fade">
                    <h1 class="pt-3">Eliminar registro</h1>
                    <div class="row justify-content-center pt-4">
                        <div class="col-md-10">
                            <form action="respuesta2.php" method="POST">
                                <div class="row justify-content-center m-0 pb-4">
                                    <div class="col-sm-3 text-center"><h5>Identificador (#)<a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5></div>
                                    <div class="col-sm-4 text-center"><input required type="number" min="1" name="idP1" class="form-control"></div>
                                </div>
                                <div class="row justify-content-center m-0">
                                    <div class="col-sm-3 text-center pt-4">
                                        <div class="form-group">
                                            <button class="btn btn-info btn-block" type="submit" required class="form-control">
                                                Enviar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>  
            </div>
            <div id="menu2" class="container tab-pane fade">
                <h1 class="pt-3">Modificación de datos</h1>
                <p class="pb-3 lead">Completar solo los campos que desea actualizar</p>
                <div class="row justify-content-center pt-2">
                    <div class="col-md-10">
                        <form action="respuesta3.php" method="POST" class="pt-3">
                            <div class="row justify-content-center m-0 pb-4">
                                <div class="col-sm-3 text-center"><h5>Identificador (#)<a href="#" data-toggle="tooltip" class="text-danger" data-original-title="Obligatorio">*</a></h5></div>
                                <div class="col-sm-4 text-center"><input required type="number" min="1" name="idP" class="form-control"></div>
                            </div>
                            <div class="text-center pb-2 display-4 pb-2">
                                Datos Personales
                            </div>
                            <h5 class="pt-3 pl-3"> Nombre</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input placeholder="Nombre actual" class="form-control mb-2" type="text" name="nombrePV" maxlength="30">
                                </div>
                                <div class="col-sm-6">
                                <input placeholder="Nuevo nombre" class="form-control mb-2" type="text" name="nombrePN" maxlength="30">
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3">Apellido</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input placeholder="Apellido actual" class="form-control mb-2" type="text" name="apellidoPV" maxlength="30">
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Nuevo apellido" class="form-control mb-2" type="text" name="apellidoPN" maxlength="30">
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3">Fecha de nacimiento</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input class="form-control " type="date" name="fnacPV">
                                    <small class="text-muted mb-2">Fecha de nacimiento actual</small>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="date" name="fnacPN">
                                    <small class="text-muted ">Nueva fecha de nacimiento</small>
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3"> No. de DNI</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input placeholder="DNI actual" class="form-control mb-2" type="number" name="dniPV">
                                </div>
                                <div class="col-sm-6">
                                <input placeholder="Nuevo DNI" class="form-control mb-2" type="number" name="dniPN">
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3">País</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                   <input placeholder="País actual" class="form-control mb-2" type="text" name="paisPV">
                                </div>
                                <div class="col-sm-6">
                                   <input placeholder="Nuevo país" class="form-control mb-2" type="text" name="paisPN">
                                </div>
                            </div>
                            <hr>
                            <div class="display-4 text-center pt-4 pb-2">
                                Métodos de contacto 
                            </div>
                            <h5 class="pt-3 pl-3">Email</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input placeholder="Email actual" class="form-control mb-2" type="email" name="emailPV">
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Nuevo email" class="form-control mb-2" type="email" name="emailPN">
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3">Móvil</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                <input placeholder="+54 9 2236807908" type="text" name="movilPV" class="form-control">
                                <small class="text-muted mb-2">No. de teléfono actual</small>
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Nuevo no. de teléfono" class="form-control mb-2" type="text" name="movilPN">
                                </div>
                            </div>
                            <hr>
                            <div class="display-4 text-center pt-4 pb-2">
                                Otros
                            </div>
                            <h5 class="pt-3 pl-3">Github</h5>
                            <div class="row m-0 pb-3">
                                <div class="col-sm-6">
                                    <input placeholder="Github actual" class="form-control mb-2" type="url" name="githubPV">
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Nuevo Github" class="form-control mb-2" type="url" name="githubPN">
                                </div>
                            </div>
                            <h5 class="pt-3 pl-3">Linkedin</h5>
                            <div class="row m-0 pb-3">
                            <div class="col-sm-6">
                                    <input placeholder="Linkedin actual" class="form-control mb-2" type="url" name="linkedinPV">
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Nuevo Linkedin" class="form-control mb-2" type="url" name="linkedinPN">
                                </div>
                            </div>
                            <div class="row justify-content-center m-0">
                                <div class="col-sm-3 text-center pt-4">
                                    <div class="form-group">
                                        <button class="btn btn-info btn-block" type="submit" required class="form-control">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
          </div>
          </div>
    </main>
    <?php mysqli_close($conexion);?>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>
</html>