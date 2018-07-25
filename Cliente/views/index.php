
<?php
$showerros = true;
if($showerros) {
  ini_set("display_errors", $showerros);
  error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
}

session_start();
// Inicia a sessão



if(!empty($_SESSION)){   //se tiver sessão
  
}
 ?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - XenaStore</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/bootstrap/js/bootstrap.min.js">
  </head>
  <body>

<?php
require_once '../../motor/requeridos.php';
require_once '../controllers/MenuRodape.php';
require_once '../controllers/Slides.php';
$MenuRodape  = new MenuRodape();
$MenuRodape->menu();
$slides = new Slides();
$slides->setImg1('../img-fixa/camisas/camisa2.jpg');
$slides->setImg2('../img-fixa/canecas/caneca1.jpg');
$slides->setImg3('../img-fixa/moletons/moletons3.jpg');
$slides->codSlide();


   $prod= new Produto();
   $prod= $prod->ReadProduto('Camisa');
?>

    <!-- Page Content -->
    <div class="container">
      <h1 class="my-4">Produtos em Destaque</h1>
      <hr>
      <!-- Marketing Icons Section -->
      <div class="row">

      <?php  foreach ($prod as $prod) {

       ?> 
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> <?php echo $prod['name_product'];?> </h4>
            <div class="card-body">
              <img src="<?php echo $prod['imagem']; ?>" style="margin-left: 100px; width: 110px; height: 120px; " >
              <p class="card-text"> Valor R$: <?php echo $prod['valor'];?> </p>
            </div>
            <div class="card-footer">
                <a href="../views/Info_Produto.php?id=<?php echo $prod['id_product']; ?>" class="btn btn-primary">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>
      <?php  } ?>
        
      </div>
    </div>
      <!-- /.row -->


<?php
$MenuRodape->Rodape();
?>

  </body>

</html>
