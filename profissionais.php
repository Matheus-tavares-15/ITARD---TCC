<?php
//include 'config/conexao.php';
  include 'config/head.php';
  include 'config/menu_comun.php';

$pag = (isset($_GET['pagina']))?$_GET['pagina'] : 1;
    
$busca = "SELECT * FROM tb_usuario where nv_user='1' order by nm_nome asc";
$todos = mysqli_query($mysqli, "$busca");

$registros = "4";

$tr = mysqli_num_rows($todos);
$tp = ceil($tr/$registros);

$inicio = ($registros*$pag)-$registros;
$limite = mysqli_query($mysqli, "$busca LIMIT $inicio, $registros");

$anterior = $pag -1;
$proximo = $pag +1;
?>


<!-- Link css profpage -->
<link rel="stylesheet" href="css/style_page_prof.css">
<div class="row justify-content-center">
  <div class="row justify-content-center">   
  <?php
    while($dados = mysqli_fetch_array($limite)){
      $foto_de_usuario = $dados['foto'];
      $nome = $dados['nm_nome'];
      $email= $dados['email'];
      $especialidade= $dados['especialidade'];
      $tel= $dados['telefone'];
      $crm=$dados['crm'];
      $localizção=$dados['localização'];

      $sql = "SELECT * FROM tb_cidade where cd_cidade='$localizção'";

      if ($query = $mysqli->query($sql)) {
        while ($dados = $query->fetch_object()) {
          $cidade=$dados->nm_nome;
          $id_uf=$dados->id_UF;

          $sql2 = "SELECT * FROM tb_uf where cd_UF='$id_uf'";

          if ($query = $mysqli->query($sql2)) {
            while ($dados2 = $query->fetch_object()) {
              $estado=$dados2->nm_nome;
            }
          }
        }
      }
      
     echo"<div class='row col-11  shadow-lg p-3 mb-5 bg-body rounded fundo '>";

     echo"<div class='col-auto' id='div_user_foto' ><img id='fotodeuser' src='pagina_usuario/config/upload/$foto_de_usuario' class='float-lg-start'></div>";
     
     echo"<div class='col-10 ml-2 text-break ' id='textouser'>";
     echo$nome."<br><hr>";
     echo$email."<br>";
     echo$cidade." - ";
     echo$estado."<br>";
     echo$tel."<br>";
     echo "Especialidade: ". nl2br($especialidade)."<br>";
     echo"N°CRM: ".$crm."<br>";
     
     echo"</div>";
     echo"</div>";
     }

  ?>
  </div>

  <div class="row justify-content-center">
    <div class='col-11  shadow-lg p-3 mb-5 bg-body rounded fundo '>
      <div class="col-auto">
        <nav aria-label="Navegação de página exemplo">
          <ul class="pagination justify-content-center">
            <?php
              if($pag >1){
            ?>
             <li class="page-item">
                <a class="page-link" href="?pagina=<?=$anterior;?>" aria-label="Anterior">
                  <span aria-hidden="true">Anterior</span>
                </a>
             </li>
            <?php }?>
             
            <?php
              for($i=1; $i<=$tp; $i++){
                if($pag == $i ){
                  echo "<li class='page-item active'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                }
                else{
                     echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
                }
              }
            ?>
             
             <?php 
             if($pag < $tp){
             ?>

            <li class="page-item">
              <a class="page-link" href="?pagina=<?=$proximo;?>" aria-label="Próximo">
                <span aria-hidden="true">Próximo</span>
              </a>
            </li>

             <?php }?>

          </ul>
        </nav>
      </div>
    </div>      
  </div>      
</div>

<?php
  include 'config/footer.php';
?>

