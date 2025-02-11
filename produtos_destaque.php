<?php 
include "conn/connect.php";
$lista = $conn->query("select * from vw_produtos where destaque = 'Sim'");
$rows_produto = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>

<!-- Mostrar se a consulta retornar vazio -->
<?php 
if($num_linhas == 0){?>
<h2 class="breadcrumb alert-danger">
    Não há produtos me destaque!
</h2>
<?php  }?>
<!-- mostrar se a consulta retornou produtos -->
<?php 
if ($num_linhas > 0){
?>
    <h2 class="breadcrumb alert-danger">
       Destaques
    </h2>
    <div class="row"><!-- linhas-->
<?php 
do{
?>        
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail ">
                   <a href="produto_detalhes.php?id=<?php echo $row_produtos['id']?>">
                       <img src="images/<?php echo $rows_produto['imagem']?>" alt="" class="img-responsive img-rounded"> 
                   </a> 
                  <div class="caption text-right bg-danger"> 
                    <h3 class="text-danger">
                        <strong><?php echo $rows_produto['descricao']?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo mb_strimwidth($rows_produto['resumo'],0,40,'...')?></strong>
                    </p>
                    <p class="text-left">
                        
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button" style="cursor: default;">
                            <?php 
                            echo "R$".number_format($rows_produto['valor'],2,',','.'); 
                            ?>
                        </button>
                        <a href="produto_detalhes.php?id=<?php echo $row_produtos['id']?>">
                            <span class="hidden-xs">Saiba mais..</span>
                            <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                    </p>
                  </div>
                </div>
                
            </div>
<?php }while($rows_produto = $lista->fetch_assoc())?>      
    </div>

<?php }?>