<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Cadastro</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="upload">
            <img src="img/user.jpg" width = 80 height = 80 alt="" id="photo">
            <div class="round">
                <input id="file" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                <i class = "fa fa-camera" style = "color: #fff;" id="uploadBtn"></i>
            </div>
        </div>

        <div class="error-text"></div>
        <div class="field input">
          <input type="text" name="name" placeholder="Seu Nome" required>
        </div>
        <div class="field input">
          <input type="text" name="email" placeholder="Seu Email" required>
        </div>
        <div class="field input">
          <input type="password" name="password" placeholder="Sua Senha" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Cadastrar">
        </div>
      </form>
      <div class="link">Já tem uma conta? <a href="login.php">Entrar</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  <script src="javascript/perfil.js"></script>

</body>
</html>
