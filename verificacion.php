<?php
$conn = mysqli_connect("localhost", "root","") or die(mysqli_error($conn));
mysqli_select_db($conn,"db_pw2") or die(mysqli_error($conn));

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    $email = $_GET['email'];
    $hash = $_GET['hash'];

    $select = "SELECT email, contrasenia, estado FROM usuario WHERE email='".$email."' AND contrasenia='".$hash."';" or die(mysqli_error($conn));
    $result = mysqli_query($conn, $select);

    $match  = mysqli_num_rows($result);

    if($match > 0){
        $update = "UPDATE usuario SET estado='1' WHERE email='".$email."' AND contrasenia='".$hash."';" or die(mysqli_error($conn));
        $stmt = $conn->prepare($update);
        $stmt->execute();

        echo '<div class="statusmsg">Su cuenta ha sido activada, ahora puede ingresar</div>';
    }else{
        echo '<div class="statusmsg">La url es inválida o ustded ya ha activado su cuenta.</div>';
    }
} else{
    echo '<div class="statusmsg">Por favor, use el link que ha sido enviado a su email.</div>';
}

?>

<a href="/"><button class="my-3 btn btn-warning">Volver a inicio</button></a>
