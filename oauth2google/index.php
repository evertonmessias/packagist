<?php
require_once "vendor/autoload.php";
use League\OAuth2\Client\Provider\Google;
echo "PAGINA INICIAL";
session_start();


ob_start();

if(empty($_SESSION['user'])){
    echo "<h1>NAO LOGADO</h1>";
    /*
    Auth Google
    */
    $google = new Google(GOOGLE);
    $authUrl = $google->getAuthorizationUrl();

    $error = filter_input(INPUT_GET,"error",FILTER_SANITIZE_STRING);
    $code = filter_input(INPUT_GET,"code",FILTER_SANITIZE_STRING);

    if($error){
        echo "<h3>VC PRECISA AUTORIZAR</h3>";
    }

    if($code){
        $token = $google->getAccessToken("authorization_code",["code"=>$code]);
        $_SESSION['user'] = serialize($google->getResourceOwner($token));
        header("Location:".GOOGLE['redirectUri']);
        exit;
    }   

    echo "<a href='{$authUrl}'>LOGIN GOOGLE</a>";

}else{
    echo "<h1>OK LOGADO!!</h1>";
    /*Google User*/
    $user = unserialize($_SESSION['user']);
    echo "<h3>Bem vindo {$user->getFirstName()}</h3>";
    echo "<h4>{$user->getEmail()}</h4>";
    echo "<img width='120' src='{$user->getAvatar()}'><br><br>";
    print_r(unserialize($_SESSION['user']));
    echo "<br><br><a href='?sair=true'>Sair</a>";
    $sair = filter_input(INPUT_GET,"sair",FILTER_VALIDATE_BOOLEAN);
    if($sair){
        unset($_SESSION['user']);
        header(("Location:".GOOGLE['redirectUri']));
    }

}
ob_end_flush();

/*
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('OIIIIIIIIII');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
*/


