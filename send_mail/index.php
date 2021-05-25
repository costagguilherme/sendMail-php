<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../html/estilo.css" type="text/css">

    <title>Send-mail</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>
<body style="background: url('../send_mail/imagens/fundo.jpg'); background-size: cover;" class="text-light">
    
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
        </div>

    <div class="row">
        <div class="col-md-12">
            <form action="processa_envio.php" method="post">
                <div class="form-group h6 mb-5">
                    <label for="para" class="mb-2">ENVIAR PARA:</label>   
                    <input type="text" class="form-control" name="para" id="para" placeholder="ex: nome@dominio.com.br">
                </div>

                <div  class="form-group h6 mb-5">  
                    <label for="assunto" class="mb-2">ASSUNTO:</label> 
                    <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto">
                </div>

                <div  class="form-group h6"> 
                    <label for="mensagem" class="mb-2">MENSAGEM:</label>  
                    <textarea class="form-control" name="mensagem" id="mensagem" placeholder="Mensagem"></textarea>
                </div>

                 <button type="submit" class="btn btn-success btn-lg mt-4">ENVIAR MENSAGEM</button>
            </form>
        </div>
    </section>

    
</body>
</html>