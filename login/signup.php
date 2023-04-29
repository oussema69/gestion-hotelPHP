
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

  <!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Sign up now</h2>
              <form>
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="nom"id="form3Example1" class="form-control" />
                      <label class="form-label" for="form3Example1">Nom</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" name="prenom"id="form3Example2" class="form-control" />
                      <label class="form-label" for="form3Example2">Prenom</label>
                    </div>
                  </div>
                </div>
  
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="email"id="form3Example3" class="form-control" />
                  <label class="form-label" for="form3Example3">Email</label>
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password"id="form3Example4" class="form-control" />
                  <label class="form-label" for="form3Example4">Mot de passe</label>
                </div>


                <div class="form-outline mb-4">
                  <input type="text" name="tel"id="form3Example4" class="form-control" />
                  <label class="form-label" for="form3Example4">Téléphone</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="file"  name="image"id="image" class="form-control" />
                  <label class="form-label" for="image" accept="images/*" >image</label>
                </div>
  
         
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="add">
                  Sign up
                </button>
                <!-- <button type="button" class="btn btn-primary btn-block mb-4" formaction="signin.php">
                    Sign in
                  </button> -->
                
  
                <!-- Register buttons -->
                <div class="text-center">
                  <p>or sign up with:</p>
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                  </button>
  
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->



</form>
</body>
</html>




<?php
require '../connection.php';

include '../User.php';

$user=new User(null,"","","","","","");
if(isset($_POST['add'])){
  $user->nom=$_POST['nom'];
  $user->prenom=$_POST['prenom'];
  $user->email=$_POST['email'];
  $user->password=$_POST['password'];
  $user->telephone=$_POST['tel'];
  $user->role=2;
  $user->image=$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$user->image);
  $user->insert($conn);
}








?>