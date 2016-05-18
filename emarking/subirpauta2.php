<html> 
<body> 
<div class="upload"> 
<form action="" method="post" enctype="multipart/form-data"> 
    <br><br>Sube un archivo: 
    <input type="file" name="archivo" id="archivo" /> <br> 
    <input type="submit" name="boton" value="Subir" /> 
</form> 
<div> 
<div class="resultado"> 
<?php 
if(isset($_POST['boton'])){ 
    // Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 20 KB
    if ((($_FILES["archivo"]["type"] == "image/gif") ||  
    ($_FILES["archivo"]["type"] == "image/jpeg") ||  
    ($_FILES["archivo"]["type"] == "image/pjpeg")) &&  
    ($_FILES["archivo"]["size"] < 20000)) { 
     
    //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
      if ($_FILES["archivo"]["error"] > 0) { 
        echo $_FILES["archivo"]["error"] . "<br />"; 
      } else { 
          // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
          if (file_exists("archivos/" . $_FILES["archivo"]["name"])) { 
            echo $_FILES["archivo"]["name"] . " ya existe. "; 
          } else { 
           // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
            move_uploaded_file($_FILES["archivo"]["tmp_name"], 
            "archivos/" . $_FILES["archivo"]["name"]); 
            echo "Archivo Subido <br />"; 
            echo "<img src='archivos/".$_FILES["archivo"]["name"]."' />"; 
          } 
      } 
    } else { 
        // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
        echo "Archivo no permitido"; 
    } 
} 
?> 
</div> 
</body> 
</html> 

