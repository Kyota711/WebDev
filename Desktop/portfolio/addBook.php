<?php
require_once("classes/User.php");
$user = new User;
$result = $user->displayAllAuthors();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LIBRARY SYSTEM</title>

  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/flexslider.css" rel="stylesheet" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Valera
    Theme URL: https://bootstrapmade.com/valera-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>   

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <!-- Navigation -->
  <div id="navigation">
    <nav class="navbar navbar-custom" role="navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-2 mob-logo">
            <div class="row">
              <div class="site-logo">
                <a href="index.html"><img src="" alt="" /></a>
              </div>
            </div>
          </div>


          <div class="col-md-10 mob-menu">
            <div class="row">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                  <i class="fa fa-bars"></i>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"></li>
                  <li><a href="addAuthor.php">Add Author</a></li>
                  <li><a href="addBook.php">Add Book</a></li>
                  <li><a href="viewUsers.php">Users</a></li>
                  <li><a href="viewBooks.php">Books</a></li>
                  <li><a href="booksBorrowed.php">Borrowed Books</a></li>
                  <li><a href="logout.php">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- /.Navbar-collapse -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </nav>
  </div>
  <!-- /Navigation -->

  <!-- Section: parallax 1 -->
  <section id="parallax1" class="home-section parallax text-light" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h2 class="big-heading highlight-dark wow bounceInDown" data-wow-delay="0.2s">We start from pixel perfect
              pattern</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- Section: contact -->
  <section id="contact" class="home-section nopadd-bot color-dark bg-white text-center">
    <div class="container marginbot-50">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
            <div class="section-heading text-center">
                <h1>ADD BOOK</h1>
            
            <form action="userAction.php"method="post">
            <input type="text" name="bname" class="form-control" id="bname" placeholder="Book Name" data-rule="minlen:4"
                data-msg="Please enter at least 4 chars" /><br> 
            <input type="text" name="ypublished" class="form-control" id="ypublished" placeholder="Year Published" data-rule="minlen:4"
                data-msg="Please enter at least 4 chars" /><br> 
            <select name="Author" class="form-control" id="ypublished" placeholder="Year Published">
               <?php
               foreach($result as $row){
                 $authorid = $row["authorid"];
                 echo"<option value='$authorid'>".$row["authorname"]."
                 </option>";
               }
               ?>
            </select>
            <br>
                <div class="text-center"><button type="submit" class="btn btn-skin btn-lg btn-block" name="book">Book</button></div>
            </form>

            </div>
          </div>
        </div>
      </div>

    </div>

    

           
          </form>
        </div>
      </div>


    </div>
  </section>
  <!-- /Section: contact -->

  <!-- google map -->
  <div id="map-btn1-div">
    <a id="map-btn1" class="gmap-btn close-map-button btn-show" href="#map">
      Click here to open the map
    </a>
  </div>
  <a id="map-btn2" class="btn btn-skin btn-lg btn-noradius gmap-btn close-map-button btn-hide" href="#map" title="Close google map"
    data-toggle="tooltip" data-placement="top">
    795 Folsom Ave, Suite 600 San Francisco, CA 94107
  </a>

  <!-- google map -->
  <section id="map" class="close-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
  <!-- /google map -->


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <div class="text-center">
            <a href="#intro" class="totop"><i class="pe-7s-angle-up pe-3x"></i></a>

            <div class="social-widget">


              <ul class="team-social">
                <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
              </ul>

            </div>
           
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Valera
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/slippry.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/morphext.min.js"></script>
  <script src="js/jquery.mb.YTPlayer.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <script src="js/jquery.nicescroll.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

