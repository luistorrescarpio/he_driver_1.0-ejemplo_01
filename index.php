<?require("he_driver/client.php")?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.2.1.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<body>
  <div class="py-5 text-center" style="	background-image: url(&quot;http://www.desarrollolibre.net//public/images/example/css/fondo-vivo-css.png&quot;);	background-size: cover;	background-position: top left;	background-repeat: repeat;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">ACCESO </h1>
          <!-- <small>user: user35 - pass: 123456</small> -->
          <form id="form_access">
            <div class="form-group"> <input type="text" class="form-control" placeholder="Usuario" id="us_login" required> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Contraseña" id="us_password" required> <small class="form-text text-muted text-right">
                <a href="#"> Recover password</a>
              </small> </div> <button type="submit" class="btn btn-primary">Enviar<br></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(window).ready(function(){
      console.log("Hoja preparada!");
      $("#form_access").submit(function(e){
        e.preventDefault();
        acceder_acuenta(); 
      });
    });
    function acceder_acuenta(){
      $.post( he.con("usuario@validar_acceso") ,{
        us_login: $("#us_login").val()        
        ,us_password: $("#us_password").val()
      },function(res){
        console.log(res);
        if(res.success){
          //action 01
          window.location.href="cuenta.php";
        }else{
          alert(res.message);
        }
      },"json");
    }
  </script>
</body>
</html>