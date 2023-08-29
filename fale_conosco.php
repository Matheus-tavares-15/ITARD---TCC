<?php
//include 'config/conexao.php';
    include 'config/head.php';
    include 'config/menu_comun.php';
?>

<!-- Link CSS home-page -->
<link rel="stylesheet" href="css/style_paginas.css">

<!-- inicio do Card de enviu de email realizado -->
<?php if (isset($_SESSION['email_enviado'])):?>
    <script>
        alert("E-mail enviado com Sucesso");
    </script>
<?php endif; unset($_SESSION['email_enviado'])?>
<!-- fim do Card de enviu de email realizado -->

<div class='row justify-content-center'>
    <div class="row col-9  shadow-lg p-3 mb-5 bg-body rounded fundo  d-flex justify-content-center">
        <h1 class='text-center'>Fale Conosco</h1><hr><br><br>
        <div class="col-lg-6 p-5 border  border-3 " >
            <form action="config/envia_email.php" method="post">
                <div class="form-group mt-1">
                    <label class="form-label">Nome </label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">E-mail </label>
                    <input type="email" class="form-control" name="email" required >
                </div> 
                <div class="form-group mt-3">
                    <label>Telefone</label>
                    <input type="tel" class="form-control" name="tel" placeholder="(xx)9xxxx-xxxx" pattern="\([0-9]{2}\)[9]{1}[0-9]{4}-[0-9]{4}" required >
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Assunto</label>
                    <input type="text" class="form-control" name="assunto" required >
                </div>
                <div class="form-group mt-3">
                    <label class="form-label">Mensagem</label>
                    <textarea name='mensagem' class="form-control" id="objetivo" rows="3" required ></textarea>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>                        
</div>


<?php
    include 'config/footer.php';
?>

