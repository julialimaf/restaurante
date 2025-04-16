<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Restaurante Buxo de Bode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Roboto', sans-serif;
        background-color: #fffaf0;
        color: #333;
      }

      .navbar-customizar {
        background-color: #800000;
        padding: 10px 20px;
      }

      .navbar-nav .nav-link {
        color: #fff !important;
        font-weight: bold;
      }

      .imagem, .arrumar {
        width: 40px;
      }

      .carousel-item {
        height: 600px;
      }

      .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .carousel-caption {
        position: absolute;
        bottom: 40px;
        left: 60px;
        color: white;
        text-align: left;
        background-color: rgba(0, 0, 0, 0.4);
        padding: 20px;
        border-radius: 10px;
      }

      .arrumado {
        font-family: 'Fugaz One', cursive;
        font-size: 3rem;
        text-align: center;
        color: #800000;
      }

      .img-bolinha {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ffcc37;
        margin-bottom: 15px;
      }

      .vermelho {
        color: #800000;
        font-weight: bold;
      }

      .amarelo {
        color: #ffcc37;
        font-weight: bold;
      }

      .btn-custom {
        background-color: #ffcc37;
        color: #800000;
        font-weight: bold;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        transition: 0.3s ease;
      }

      .btn-custom:hover {
        background-color: #e0b200;
        color: white;
      }

      .featurette-heading {
        font-size: 2rem;
        font-weight: 700;
      }

      .featurette-divider {
        margin: 5rem 0;
      }

      .lead {
        font-size: 1.1rem;
        line-height: 1.6;
      }
      .footer {
            background-color: #7d1116;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark navbar-customizar">
      <a class="navbar-brand" href="#"><img src="logo.png" class="imagem" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="cardapio.php"><p class="amarelo">Cardápio</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reserva.php"><p class="amarelo">Reservas</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><img src="login.png" class="arrumar" alt="Login"></a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="meuCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#meuCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#meuCarousel" data-slide-to="1"></li>
        <li data-target="#meuCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="slide1.png" alt="Imagem 1">
        </div>
        <div class="carousel-item">
          <img src="slide2.png" alt="Imagem 2">
        </div>
        <div class="carousel-item">
          <img src="slide3.png" alt="Imagem 3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#meuCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#meuCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
    <br> <br><br><br><br><br> <br><br>
    <div class="container mt-5">
      <h1 class="arrumado">Pratos da Semana</h1>
      <div class="row text-center">
        <div class="col-lg-4">
          <img src="buxada.jpg" class="img-bolinha" alt="Buxada 1">
          <h2 class="vermelho">Buxada</h2>
          <p>A buxada é um prato típico do Nordeste feito com as vísceras do bode bem temperadas.</p>
          <a class="btn btn-custom" href="#">Ver cardápio</a>
        </div>
        <div class="col-lg-4">
          <img src="buxada.jpg" class="img-bolinha" alt="Buxada 2">
          <h2 class="vermelho">Buxada</h2>
          <p>Com sabor marcante, a buxada é cozida lentamente com legumes e bastante cheiro-verde.</p>
          <a class="btn btn-custom" href="#">Ver cardápio</a>
        </div>
        <div class="col-lg-4">
          <img src="buxada.jpg" class="img-bolinha" alt="Buxada 3">
          <h2 class="vermelho">Buxada</h2>
          <p>Tradição nordestina, a buxada é símbolo de resistência cultural e sabor autêntico.</p>
          <a class="btn btn-custom" href="#">Ver cardápio</a>
        </div>
      </div>
    </div>

    <hr class="featurette-divider">
      <br> <br><br><br><br>
    <div class="container">
      <div class="row featurette d-flex align-items-center">
        <div class="col-md-7">
          <h2 class="featurette-heading">
            <span class="vermelho">Buxada arretada</span>
            <span class="amarelo"> - verdadeira buxada arretada</span>
          </h2>
          <p class="lead">A buxada de bode é um prato tradicional e marcante da culinária nordestina, feito com as vísceras do bode (bucho, tripas, fígado, coração, entre outros), bem limpas e cozidas lentamente em um caldo rico e temperado com alho, cebola, pimentão, tomate, coentro, hortelã e outras especiarias. O sabor é forte, encorpado e único — uma verdadeira explosão de nordestinidade no prato. Servida com arroz, pirão, farinha ou até macaxeira, a buxada é símbolo de resistência cultural.</p>
        </div>
        <div class="col-md-5">
          <img src="buxada.jpg" class="img-fluid" alt="Buxada Tradicional">
        </div>
      </div>
    </div>

    <br><br><br><br>

    <div class="container">
      <div class="row featurette d-flex align-items-center">
        <div class="col-md-7">
          <h2 class="featurette-heading">
            <span class="vermelho">Buxada arretada</span>
            <span class="amarelo"> - verdadeira buxada arretada</span>
          </h2>
          <p class="lead">A buxada de bode é um prato tradicional e marcante da culinária nordestina, feito com as vísceras do bode (bucho, tripas, fígado, coração, entre outros), bem limpas e cozidas lentamente em um caldo rico e temperado com alho, cebola, pimentão, tomate, coentro, hortelã e outras especiarias. O sabor é forte, encorpado e único — uma verdadeira explosão de nordestinidade no prato. Servida com arroz, pirão, farinha ou até macaxeira, a buxada é símbolo de resistência cultural.</p>
        </div>
        <div class="col-md-5">
          <img src="buxada.jpg" class="img-fluid" alt="Buxada Tradicional">
        </div>
      </div>
    </div>

    <div class="footer">
    <p>&copy; 2025 Buxo de Bode. Todos os direitos reservados.</p>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>
