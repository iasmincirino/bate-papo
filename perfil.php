<?php
    session_start();
    include_once "php/config.php";
    $outgoing_id = $_SESSION['unique_id'];

    if(isset($_POST['update_profile'])){

      $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
      $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   
      $update_query = mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email' WHERE unique_id = '$outgoing_id'") or die('query failed');

      if($update_query){
         move_uploaded_file($update_name, $update_email);
         $message[] = 'Editado com sucesso!';
      } else{
         $message[] = 'Mudou nada!';
      }
   
      $update_image = $_FILES['update_image']['name'];
      $update_image_size = $_FILES['update_image']['size'];
      $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
      $update_image_folder = 'php/images/'.$update_image;
   
      if(!empty($update_image)){
         if($update_image_size > 100000000){
            $message[] = 'Imagem muito grande!';
         }else{
            $image_update_query = mysqli_query($conn, "UPDATE `users` SET img = '$update_image' WHERE unique_id = '$outgoing_id'") or die('query failed');
            if($image_update_query){
               move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
         }
      }
   
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Font-Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!--CSS-->
  <link rel="stylesheet" href="css/perfil.css">
  <!--Icon-->
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <title>Perfil</title>
</head>

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE unique_id = '$outgoing_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $row = mysqli_fetch_assoc($select);
      }
   ?>

<div class="cont upload">
   <form class="box" action="" method="post" enctype="multipart/form-data">
      <input type="file" id="file" name="update_image" aaccept="image/x-png,image/gif,image/jpeg,image/jpg">
      <?php
         if($row['img'] == ''){
            echo '<img class="imagem" id="photo" src="img/user.jpg">';
         }else{
            echo '<img class="imagem" id="photo" src="php/images/'.$row['img'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message" style="color:#000;" >'.$message.'</div> <br>';
            }
         }
      ?> 

      <label for="file" id="uploadBtn">EDITAR FOTO</label>
      <input type="text" name="update_name" class="inpu" value="<?php echo $row['name']; ?>">
      <input type="email" name="update_email" class="inpu" value="<?php echo $row['email']; ?>" >

      <div class="botao">
      <input type="submit" name="update_profile" value="ATUALIZAR" style="float: left;margin: 10px 0 0 18.2%;" class="btn">
      <a href="users.php" style="float: right;margin:10px 18.2% 0 0;" class="btn">VOLTAR</a>
      </div>
      
    </form>
</div>

  <script src="javascript/perfil.js"></script>
</body>
</html>
