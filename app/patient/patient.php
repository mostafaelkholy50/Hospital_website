<?php
include "../../share/head.php";
if (empty($_SESSION['patient'])) {
     header('location: http://localhost/hospital/pages/login.php');
} else {
     $select_doctor = "SELECT*FROM doctors";
     $query_doctor = mysqli_query($connect, $select_doctor);
     $select_admin = "SELECT*FROM admin";
     $query_admin = mysqli_query($connect, $select_admin);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

     <title>Health - Medical Website Template</title>
     <!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?= url('assets/css/bootstrap.min.css') ?>">
     <link rel="stylesheet" href="<?= url('assets/css/font-awesome.min.css') ?>">
     <link rel="stylesheet" href="<?= url('assets/css/animate.css') ?>">
     <link rel="stylesheet" href="<?= url('assets/css/owl.carousel.css') ?>">
     <link rel="stylesheet" href="<?= url('assets/css/owl.theme.default.min.css') ?>">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?= url('assets/css/tooplate-style.css') ?>">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>
     <form action="" method="post">
          <?= include "../../share/header_user.php" ?>

          
          </form>
          
          <!-- HOME -->
          <section id="home" class="slider" data-stellar-background-ratio="0.5">
               <div class="container">
                    <div class="row">
                         
                    <div class="owl-carousel owl-theme">
                         <div class="item item-first">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Let's make your life happier</h3>
                                        <h1>Healthy Living</h1>
                                        <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                                   </div>
                              </div>
                         </div>
                         
                         <div class="item item-second">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Aenean luctus lobortis tellus</h3>
                                        <h1>New Lifestyle</h1>
                                        <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">More About Us</a>
                                   </div>
                              </div>
                         </div>
                         
                         <div class="item item-third">
                              <div class="caption">
                                   <div class="col-md-offset-1 col-md-10">
                                        <h3>Pellentesque nec libero nisi</h3>
                                        <h1>Your Health Benefits</h1>
                                        <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Read Stories</a>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>
     
     
     <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">
                    
                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Your <i class="fa fa-h-square"></i>ealth Center</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
                                   <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
                              </div>
                              <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                   <img src="<?= url('assets/images/author-image.jpg') ?>" class="img-responsive" alt="">
                                   <figcaption>
                                        <h3>Dr. Neil Jackson</h3>
                                        <p>General Principal</p>
                                   </figcaption>
                              </figure>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>
     
     
     <!-- TEAM -->
     <section id="team" data-stellar-background-ratio="1">
          <div class="container">
               <div class="row">
                    
                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                         </div>
                    </div>
       
                    <div class="clearfix">
                          <?php foreach ($query_doctor as $item):   ?>
                         <div class="col-md-4 col-sm-6">
                              <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                                   
                                        <div class="team-info">
                                             <h3><?= $item['FullName'] ?></h3>
                                             <p>Doctor <b><?= $item['Specialization'] ?></b></p>
                                             <div class="team-contact-info">
                                                  <p><i class="fa fa-phone"></i> <?= $item['PhoneNumber'] ?></p>
                                                  <p><i class="fa fa-envelope-o"></i> <a href="#"><?= $item['Email'] ?></a></p>
                    
                                                  <a class="btn btn-primary text-white w-100" href="./checkout.php?id=<?= $item['DoctorID'] ?>" name="send" type="submit">Book Appointment</a>
                                                  
                                             </div>
                                             
                                        </div>
                                        
                                   </div>
                              </div>
                              <?php endforeach?>
                    </div>
                   
                         </div>
          </div>
     </section>
     
     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">
                    
                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Create By </h4>
                              <?php foreach ($query_admin as $item):  ?>
                                   <div class="contact-info">
                                        <p><i class="fa fa-phone"></i> <?= $item['FullName'] ?></p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="#"><?= $item['Email'] ?></a></p>
                                   </div>
                                   <?php endforeach  ?>
                              </div>
                         </div>
                         
                         <div class="col-md-4 col-sm-4">
                              <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Latest News</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="<?= url('assets/images/news-image.jpg') ?>" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#">
                                             <h5>Amazing Technology</h5>
                                        </a>
                                        <span>March 08, 2018</span>
                                   </div>
                              </div>

                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="<?= url('assets/images/news-image.jpg') ?>" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <a href="#">
                                             <h5>New Healing Process</h5>
                                        </a>
                                        <span>February 20, 2018</span>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                                   <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                                   <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                                   <p>Sunday <span>Closed</span></p>
                              </div>
                              
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text">
                                   <p>Copyright &copy; 2018 Your Company

                                        | Design: Tooplate</p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                              <div class="footer-link">
                                   <a href="#">Laboratory Tests</a>
                                   <a href="#">Departments</a>
                                   <a href="#">Insurance Policy</a>
                                   <a href="#">Careers</a>
                              </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn">
                                   <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="<?= url('assets/js/jquery.js') ?>"></script>
     <script src="<?= url('assets/js/bootstrap.min.js') ?>"></script>
     <script src="<?= url('assets/js/jquery.sticky.js') ?>"></script>
     <script src="<?= url('assets/js/jquery.stellar.min.js') ?>"></script>
     <script src="<?= url('assets/s/wow.min.js') ?>j"></script>
     <script src="<?= url('assets/js/smoothscroll.js') ?>"></script>
     <script src="<?= url('assets/js/owl.carousel.min.js') ?>"></script>
     <script src="<?= url('assets/js/custom.js') ?>"></script>
     

</body>

</html>