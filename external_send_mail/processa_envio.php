<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem {

        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function mensagemValida() {
            if ( trim($this->para) == '' ||  trim($this->assunto) == '' ||  trim($this->mensagem) == '') {
                return false;
            } 
            else {
                    return true;
            }
            
        }

    }



    $mensagem = new Mensagem();
    // Recuperandos os valores do campos através da super global POST.
    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);


    if ($mensagem->mensagemValida() == false) {
        echo 'Mensagem não é válida';
        header('Location: index.php?campoVazios');
        die();
    }


    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'usuario@gmail.com';                     //SMTP username
    $mail->Password   = 'senha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('usuario@gmail.com');
    $mail->addAddress($mensagem->__get('para'));     //Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    //$mail->AltBody = 'Conteúdo do e-mail';

    $mail->send();
    echo'E-mail enviado com sucesso';


} catch (Exception $e) {
    echo "ERRO!! Não foi possível enviar este e-mail, tente novamente." . '</br>';
    echo "Detalhes do erro: {$mail->ErrorInfo}";
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../html/estilo.css" type="text/css">

    <title>Send-mail</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    

    <section class="container">
        <div class="mt-4">
            <div class="d-flex justify-content-center mb-3">
                <img src="../send_mail/imagens/logotipo.png" style="width: 80px;">
            </div>
            <div class="d-flex justify-content-center">
                <h1 class="h1">Send-Mail</h1>
            </div>
            <div class="d-flex justify-content-center lead">
                <p>Seu app de envio de emails particular!</p>
            </div>
            <div class="d-flex justify-content-center lead">
                <a href="index.php" class="btn btn-lg btn-success mb-5">Voltar</a>
            </div>
        </div>
    </section>

</body>
</html>