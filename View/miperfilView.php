<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Estilos personalizados -->
  <style>
   
    .perfil-card {
      background-color: #fce8e6; /* Color de fondo de la tarjeta */
      border: none;
      border-radius: 10px;
    }
    .perfil-image {
      border-radius: 50%;
      border: 5px solid #f4cccc; /* Borde rosa pálido */
      margin:0 auto;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card perfil-card">
        <img src="../img/gente.png" class="card-img-top perfil-image" style="width:100px;" alt="Imagen de perfil">
        <div class="card-body text-center">
          <h5 class="card-title">Nombre de Usuario</h5>
          <p class="card-text">Descripción del usuario o detalles adicionales.</p>
          <a href="#" class="btn btn-primary">Editar Perfil</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS y jQuery (opcional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
