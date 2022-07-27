<?php
    include_once('tbs_class.php'); 
    include_once('../plugins/tbs_plugin_opentbs.php'); 
    include_once 'conexion.php';
    session_start(); 
    $con=new Conexion();
    $con=$con->conectar();

if($con){    
    $user = $_GET['user'];
    $sql="SELECT a.cedulaEstudiante, a.nombre, a.fechaNacimiento, a.edad, a.telefono, a.correo, a.direccion, a.facultad, a.nivelPractica, a.nomPrograma, a.electiva, a.promedio, a.perfilProf, a.perfilPract, a.contratoAprendizaje, a.entidad, a.requerimientos, a.cual, a.ciudad, a.fecha, b.titulo, b.institucion, b.fechaGrado, c.nombreC, c.institucionC, c.intensidad, c.fechaC FROM tblestudiante a INNER JOIN tbltitulos b ON a.cedulaEstudiante = b.cedulaEstudiante INNER JOIN tblcomplementaria c ON c.cedulaEstudiante = a.cedulaEstudiante WHERE a.cedulaEstudiante= '".$user."'";  
    $consulta=$con->prepare($sql);
    $consulta->execute(); 
    $sql2="SELECT  `titulo`, `institucion`, `fechaGrado` FROM `tbltitulos` WHERE cedulaEstudiante = '".$user."'";  
    $consulta2=$con->prepare($sql2);
    $consulta2->execute(); 
    if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
        while ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){
            $titulo = $fila['titulo'];
            $institucion = $fila2['institucion'];
            $fechaGrado = $fila2['fechaGrado'];
            

    $TBS = new clsTinyButStrong; 
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN); 

    //Parametros
    $cedulaEstudiante =  $fila['cedulaEstudiante'];
    $nombre = $fila['nombre'];
    $edad = $fila['edad'];
    $nacimiento = $fila['fechaNacimiento'];
    $final = strtotime($nacimiento);
    $mes = date('n', $final);
    $dia = date('d', $final);
    $ao = date('Y', $final);
    $telefono = $fila['telefono'];
    $correo = $fila['correo'];
    $direccion = $fila['direccion'];
    $facultad = $fila['facultad'];
    $nivelPractica = $fila['nivelPractica'];
    $nomPrograma = $fila['nomPrograma'];
    $electiva = $fila['electiva'];
    $promedio = $fila['promedio'];
    $foto = 'anexos/foto_'.$user.'.jpg';
 

    //Cargando template
    $template = 'Hoja de vida.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8);
    //Escribir Nuevos campos
    $TBS->MergeField('pro.cedulaEstudiante', $cedulaEstudiante);
    $TBS->MergeField('pro.nombre', $nombre);
    $TBS->MergeField('pro.edad', $edad);
    $TBS->MergeField('pro.mes', $mes);
    $TBS->MergeField('pro.dia', $dia);
    $TBS->MergeField('pro.ao', $ao);
    $TBS->MergeField('pro.telefono', $telefono);
    $TBS->MergeField('pro.correo', $correo);
    $TBS->MergeField('pro.direccion', $direccion);
    $TBS->MergeField('pro.facultad', $facultad);
    $TBS->MergeField('pro.nivelPractica', $nivelPractica);
    $TBS->MergeField('pro.nomPrograma', $nomPrograma);
    $TBS->MergeField('pro.electiva', $electiva);
    $TBS->MergeField('pro.promedio', $promedio);
    $TBS->MergeField('pro.titulo', $titulo);
    $TBS->MergeField('pro.institucion', $institucion);
    $TBS->MergeField('pro.fechaGrado', $fechaGrado);
    $TBS->VarRef['x'] = $foto;

    $TBS->PlugIn(OPENTBS_DELETE_COMMENTS);

    $save_as = (isset($_POST['save_as']) && (trim($_POST['save_as'])!=='') && ($_SERVER['SERVER_NAME']=='localhost')) ? trim($_POST['save_as']) : '';
    $output_file_name = str_replace('.', '_'.$user.$save_as.'.', $template);
    if ($save_as==='') {
        $TBS->Show(OPENTBS_DOWNLOAD, $output_file_name); 
        exit();
    } else {
        $TBS->Show(OPENTBS_FILE, $output_file_name);
        exit("File [$output_file_name] has been created.");
    }

}
}
}
?>