<?php
//include 'config/conexao.php';
    include 'config/head.php';
    include 'config/menu_comun.php';
?>

<!-- Link CSS home-page -->
<link rel="stylesheet" href="css/style_home.css">
<link rel="stylesheet" href="css/forumestilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="col-12 mb-4" id="banner">
        <center>
    <img src="img/bannerPrancheta1.png" alt="" class="baner">
    </center>
    </div>
<!-- Inicio do Carro no ceu  -->

<div class="row justify-content-center">
 
<!-- quebra de linha bunitinha XD -->
<div class="row  justify-content-center" id="linhapag"><div class='col-11 mb-4 mt-4'><hr></div>
<!-- FIM da quebra de linha bunitinha -->

<div class=' offset-lg-1  offset-md-1 col-11' id="carronoseu">
    <div id="carouselExampleCaptions" class="carousel slide shadow-lg p-3 mb-5 bg-body rounded col-11 " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.png" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block text-dark bg-white texto_card " >
                <h3>Sobre o projeto</h3>
                </div>
            </div>
            <div class="carousel-item ">
                    <img src="img/slide2.png" class="d-block w-100 " >
                    <div class="carousel-caption d-none d-md-block  text-dark bg-white texto_card">
                        <h5>Intuito do Projeto</h5>
                        <p>O projeto Itard foi criado para conectar profissionais da área da saúde com pais, professores e responsáveis de crianças com algum tipo de transtorno psicológico.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/slide3.png" class="d-block w-100" >
                    <div class="carousel-caption d-none d-md-block text-dark bg-white texto_card">
                        <h5>Saiba mais sobre o Projeto </h5>
                        <p><a href="sobre.php">Clicando aqui</a></p>
                    </div>
                </div>
            </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>     
</div>
</center> 
 
</div>
 <!-- quebra de linha bunitinha XD -->
<div class="row  justify-content-center"><div class='col-11'><hr></div></div>   

<!-- FIM da quebra de linha bunitinha -->
<!-- FIM do carro no ceu -->


<!-- Inicio dos cards -->
<div class="row  justify-content-center">
        <div class="shadow-lg p-3 mb-5 bg-body rounded row col-9 text-white"  style="background-image: radial-gradient(circle at 50% 50%,#2f1632 0,#291030 25%,#21092e 50%,#1a002c 75%,#13002b 100%); font-family: 'Praise', cursive;"> <p class="text-center"><h1 class="text-center text-break">Melhores Publicações  </h1></p></div><br>
  
        <div class="row col-12 justify-content-center" id="top3">

            <style>
                    .img1{
                     margin-top:7px;
                    }
            </style>
        </div>
        <?php 
        
            $sql = "SELECT count(*) as total from tb_forum ";
            $result = mysqli_query($mysqli , $sql);
            $row = mysqli_fetch_assoc($result);

        if($row['total'] == 0){
            echo'
             <div class="shadow-lg p-3 mb-5 bg-body rounded row col-9" style="">
                <div class="card-header"><h1>Atenção!!</h1></div>
                    <div class="">
                        <p class="card-text p-3"> Nenhum Post encontrado (Provavelmente não foi postado nenhum artigo sobre o tema)  </p>
                    </div>
                </div>
             </div>';   
}?>

    <!-- Fim dos Cards -->
    
<!-- Quebra de linha bunitinha -->

<div class="row col-12 justify-content-center"><div class='col-11'><hr></div></div>

<!-- Fim da quebra de linha Bunitinha -->

<div class="shadow-lg p-3 mb-5 bg-body rounded row col-9 text-white"  style="background-image: radial-gradient(circle at 50% 50%,#2f1632 0,#291030 25%,#21092e 50%,#1a002c 75%,#13002b 100%); font-family: 'Praise', cursive;"> <p class="text-center"><h1 class="text-center text-break">Publicações mais recentes  </h1></p></div><br>

<div class="row  justify-content-center">
<?php  
        ini_set('display_errors', 0 ); error_reporting(0);
        $sql = "select * from tb_forum ORDER BY cd_post DESC limit 3";
                                    
        if ($query = $mysqli->query($sql)) {
            while ($dados = $query->fetch_object()) {
                $titulo_texto = $dados->titulo_texto;
                $dt_data_post = $dados->dt_data_post;
                $cd_post= $dados->cd_post;
                $tx_post=$dados->tx_post;
                $tema_post=$dados->cd_transtorno;
                $cd_user_post=$dados->cd_user_post;
                        
                $sql2 = "select * from tb_usuario where cd_usuario = '$cd_user_post'";

                if ($query2 = $mysqli->query($sql2)){
                    while ($dados2 = $query2->fetch_object()) {
                        $nome_post=$dados2->nm_nome;
                        $foto_user=$dados2->foto;
                        $email = $dados2->email;
                        $objetivo = $dados2->objetivo;
                        $crm= $dados2->crm;
                        $especialidade=$dados2->especialidade;
                        $telefone=$dados2->telefone;
                        $localização=$dados2->localização;

                        $sql5 = "SELECT * FROM tb_cidade where cd_cidade='$localização'";

                        if ($query5 = $mysqli->query($sql5)) {
                            while ($dados6 = $query5->fetch_object()) {
                                $cidade=$dados6->nm_nome;
                                $id_uf=$dados6->id_UF;
                                
                                $sql6 = "SELECT * FROM tb_uf where cd_UF='$id_uf'";

                                if ($query6 = $mysqli->query($sql6)) {
                                        while ($dados5 = $query6->fetch_object()) {
                                            $estado=$dados5->nm_nome;
                                        }
                                }
                            }
                        } 
                    }
                }

                $sql3 = "select * from tb_transtornosmentais where cd_transtorno = '$tema_post'";
                                                                                    
                if ($query3 = $mysqli->query($sql3)) {
                    while ($dados3 = $query3->fetch_object()) {
                        $nm_transtorno=$dados3->nm_transtorno;
                    }
                }
    ?>                                                    
        <div class='row col-lg-9 col-md-8 col-sm-8 shadow-lg p-3 mb-5 bg-body rounded fundo mt-4 '>
            <div type="button" style="margin:0; padding:0;" data-bs-toggle="modal" data-bs-target="#myModaluser<?php echo$cd_user_post;?>">
                <div class="col-4 mx-2" id="fotouser" style="float:left" >
                    <img id="fotodeusuario" src="pagina_usuario/config/upload/<?php echo $foto_user ?>" alt="">
                </div>
                <div class='col-lg-5 col-md-8 col-sm-8' id="nomedeuser">
                    <p><?php echo $nome_post;?><br> 
                </div>
            </div>

            <hr>

            <div class=' row col-12'>
                <p class="text-break"><b><?php echo  $titulo_texto  ?></b></p>
                <p class="text-break"><?php echo $tx_post ?></p>  
                <p class="text-muted text-break" style="font-size:15px">Data de publicação:<?php echo  $dt_data_post ?></p>
                <p class="text-muted text-break" style="font-size:15px">Tema de publicação:<?php echo  $nm_transtorno ?></p>
            </div>
            
            <hr>
            
            <div>
                <button class='btn mx-2 botaocomentario' style="float:left" id="comentarios<?php echo $cd_post ?>"><i class='bx bxs-comment-detail me-2'></i>Comentários</button>
                <div id="like<?php echo $cd_post;?>" class="btn mx-2 botaolike like2" > <div class="" style="float:left"><i class='bx bx-like' ></i></div> <div id="num_like<?php echo  $cd_post;?>" style="float:left; padding-left:10px"><?php echo $num_likes;?></div> </div>   
            </div>
            <div id="campodecomentario<?php echo $cd_post ?>"><hr>
                <div id="todos_os_comentarios<?php echo $cd_post ?>">
                </div>
            </div>
        </div><br>
            

    <script> 
        $(document).ready(function(){
        $("#comentarios<?php echo $cd_post ?>").click(function(){
            $("#campodecomentario<?php echo $cd_post ?>").slideToggle("slow");
        });
        });
         setInterval(function (){
            $('#todos_os_comentarios<?php echo $cd_post ?>').load("config/fetch.php?idpost=<?php echo $cd_post ?>");
        }, 1000);
        setInterval(function (){
            $('#num_like<?php echo  $cd_post;?>').load("config/fetch_post.php?idpost=<?php echo $cd_post ?>");
        }, 1000);

    </script>
    <style>
    #campodecomentario<?php echo $cd_post ?> {
    display: none;
    }
    </style>

                                
    <div class="modal fade" id="myModaluser<?php echo $cd_user_post;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-11">           
                        <div class="col-12 mx-2" id="fotouser" style="float:left" >
                            <img id="fotodeusuario" src="pagina_usuario/config/upload/<?php echo $foto_user ?>" alt="">
                        </div>
                        <div class='col-12 ' id="nomedeuser" >
                                <p class=''><?php echo $nome_post;?><br>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                            
                <div class=" row modal-body">
                    <P>N°CRM: <?php echo $crm;?></P>
                    <p>E-mail: <?php echo $email; ?></p>
                    <p>Objetivo: <?php echo $objetivo; ?></p>
                    <p>Especialidade: <?php echo $especialidade; ?></p>
                    <p>Cidade: <?php echo $cidade; ?></p>
                    <p>Estado: <?php echo $estado  ; ?></p>
                </div>
            </div>                   
        </div>
    </div>       
    <?php  }}?>	  
    <?php 
        
        $sql = "SELECT count(*) as total from tb_forum ";
        $result = mysqli_query($mysqli , $sql);
        $row = mysqli_fetch_assoc($result);

    if($row['total'] == 0){
        echo'
         <div class="shadow-lg p-3 mb-5 bg-body rounded row col-9" style="">
            <div class="card-header"><h1>Atenção!!</h1></div>
                <div class="">
                    <p class="card-text p-3"> Nenhum Post encontrado (Provavelmente não foi postado nenhum artigo sobre o tema)  </p>
                </div>
            </div>
         </div>';   
}?>       
    </div>
</div>

<?php
    include 'config/footer.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
setInterval(function (){
    $('#top3').load("config/fetch_top3_inicio.php");
    }, 1500);

</script>

<style> 
#panel {
  padding: 10px;
  display: none;
}

</style>


