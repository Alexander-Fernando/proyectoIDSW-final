<?
    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;


    try(){
        $pdo = new PDO($servidor, USUARIO, PASSWORD);
        echo "<script>alert('Conectado a la base de datos....')</script>";
    }catch(PDOException $e){
        echo "<script>alert('error....')</script>";
    }

?>