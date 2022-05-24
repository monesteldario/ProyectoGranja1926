<?php

    function Iniciar()
    {
        $servidor = "localhost";
        $nombreUsuario = "root";
        $password = "";
        $baseDatos = "granjaavicola";      
        
        $conexion = new mysqli($servidor,$nombreUsuario,$password,$baseDatos);
       
        return $conexion;
    }

    function Finalizar($conexion)
    {
        $conexion -> close();
    }

    function notificar($correo, $nombre) {
		
		require 'PHPMailer/src/PHPMailer.php';
		require 'PHPMailer/src/SMTP.php';

		$mail = new PHPMailer();
		$mail -> CharSet = 'UTF-8';

		$body = 'Cuerpo del correo de prueba... Hola ' . $nombre . ' su registro se ha realizado correcto';

		$mail -> IsSMTP();
		$mail -> Host = 'smtp.office365.com'; //o gmail
		$mail -> SMTPSecure = 'tls';
		$mail -> Port = ; // o 25
		$mail -> SMTPAuth = true;
		$mail -> Username = 'claseProgra3.5@outlook.com';
		$mail -> Password = '';
		$mail -> SetFrom('claseProgra3.5@outlook.com', "");
		$mail -> Subject = 'Correo de prueba';
		$mail -> MsgHTML($body);

		$mail->AddAddress($correo, 'Estudiante');
		$mail->send();
	}

?>