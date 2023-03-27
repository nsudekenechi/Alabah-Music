 <!-- Begin Modal Area -->
 <div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close"
                     data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                     data-tippy-arrow="true" data-tippy-theme="sharpborder" id="modal-close">
                 </button>
             </div>
             <div class="modal-body">
                 <div class="modal-wrap row">
                     <div class="col-lg-6">
                         <div class="modal-img">
                             <div class="swiper-container modal-slider">

                                 <div class="swiper-wrapper">
                                     <div class="swiper-slide position-relative">
                                         <style>
                                             .swiper-overlay {
                                                 width: 100%;
                                                 height: 100%;
                                                 background-color: rgba(0, 0, 0, .5);
                                                 display: flex;
                                                 align-items: center;
                                                 justify-content: center;
                                                 cursor: pointer;
                                                 font-size: 5rem;
                                                 color: white;
                                             }

                                             .single-img img {
                                                 width: 100%;
                                                 height: 100%;
                                             }
                                         </style>
                                         <a class="single-img">
                                             <div class="swiper-overlay position-absolute">
                                                 <i class="entypo-icon-controller-play"></i>
                                             </div>
                                             <img class="img-full" id="modal-img-full" src="" alt="Product Image">
                                         </a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 pt-5 pt-lg-0">
                         <div class="single-product-content">
                             <div class="d-flex">
                                 <h2 class="title " id="modal-title"></h2>

                             </div>

                             <div class="price-box d-flex align-items-center">
                                 <span class="new-price" style="margin-right:10px;" id="modal-price"></span>
                                 <span class="new-price " style="font-size: 20px;"><del id="old-price"></del></span>
                             </div>

                             <div class="rating-box-wrap">
                                 <div class="rating-box">
                                     <ul>
                                         <li><i class="fa fa-star"></i></li>
                                         <li><i class="fa fa-star"></i></li>
                                         <li><i class="fa fa-star"></i></li>
                                         <li><i class="fa fa-star"></i></li>
                                         <li><i class="fa fa-star"></i></li>
                                     </ul>
                                 </div>

                             </div>
                             <div class="rating-box-wrap">
                                 <div class="rating-box">
                                     <ul style="display: block;" id="ul">

                                     </ul>
                                 </div>

                             </div>
                             <div class="selector-wrap color-option">
                                 <span class="selector-title border-bottom w-50">Lease Type</span>
                                 <select class="nice-select wide border-bottom rounded-0 " id="lease-type">
                                     <option value="Basic Lease">Basic Lease</option>
                                     <option value="Exclusive Lease">Exclusive Lease</option>
                                     <option value="Premium Exclusive Lease">Premium Exclusive Lease</option>

                                 </select>
                             </div>

                             <ul class="list-group"></ul>
                             <div class="my-3">
                                 <ul class="lease-info  list-group">

                                 </ul>
                             </div>
                             <ul class="quantity-with-btn">

                                 <li class="add-to-cart-1">
                                     <a class="custom-circle-btn" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder">
                                         <i class="pe-7s-cart"></i>
                                     </a>
                                 </li>

                                 <li class="wishlist-btn-wrap">
                                     <a class="custom-circle-btn" data-tippy="Purchase Item" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder" href="./checkout.php">
                                         <i class="pe-7s-shopbag"></i>
                                     </a>
                                 </li>

                             </ul>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Modal Area End Here -->

 <!-- Begin Footer Area -->
 <div class="footer-area" data-bg-image="assets/images/footer/bg/1-1920x465.jpg">
     <div class="footer-top section-space-top-100 pb-10 mt-5">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="footer-widget-item col-lg-6">
                         <div class="footer-widget-logo">
                             <a href="./index.php">
                                 <img src="./Img/logo.png" width="100" alt="Logo">

                                 <!-- <img src="assets/images/logo/dark.png" alt="Logo"> -->
                             </a>
                         </div>
                         <p class="footer-widget-desc">Music reminds us of our past, drives us forward and inspires us
                             to live beyond limits.
                             <br>
                             Here at Dopemind Studios we create the perfect sounds that helps you find the inner you.
                         </p>

                         <h3 class="footer-widget-title">Connect with us on:</h3>
                         <div class="social-link with-border">
                             <ul>
                                 <li>
                                     <a href="#" data-tippy="Facebook" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder">
                                         <i class="fa fa-facebook"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" data-tippy="Twitter" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder">
                                         <i class="fa fa-twitter"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" data-tippy="Whatsapp" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder">
                                         <i class="fa fa-whatsapp"></i>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#" data-tippy="Instagram" data-tippy-inertia="true"
                                         data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                         data-tippy-theme="sharpborder">
                                         <i class="fa fa-instagram"></i>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- <div class="col-lg-6 col-md-4 pt-40">
                    <div class="footer-widget-item">
                        <h3 class="footer-widget-title">Useful Links</h3>
                        <ul class="footer-widget-list-item">
                            <li>
                                <a href="#">About Pronia</a>
                            </li>
                            <li>
                                <a href="#">How to shop</a>
                            </li>
                            <li>
                                <a href="#">FAQ</a>
                            </li>
                            <li>
                                <a href="#">Contact us</a>
                            </li>
                            <li>
                                <a href="#">Log in</a>
                            </li>
                        </ul>
                    </div>
                </div> -->

                 <div class="col-lg-6 col-md-4 pt-40">
                     <div class="footer-widget-item">
                         <h3 class="footer-widget-title">Our Services</h3>
                         <ul class="footer-widget-list-item">
                             <li>
                                 <a href="#">Beat Making</a>
                             </li>
                             <li>
                                 <a href="#">Mixing</a>
                             </li>
                             <li>
                                 <a href="#">Mastering</a>
                             </li>
                             <li>
                                 <a href="#">Music Production</a>
                             </li>
                             <li>
                                 <a href="#">Song Writing</a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 pt-40">
                     <div class="footer-contact-info">
                         <h3 class="footer-widget-title">Got Any Question? Call Us</h3>
                         <a class="number" href="tel://+2349164066049">+234 916 406 6049</a>
                         <a class="number" href="tel://+2348036328814">+234 803 6328 814 </a>
                     </div>

                 </div>
             </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="copyright">
                         <span class="copyright-text">©
                             <?= date("Y"); ?>
                             DopeMind Studios</i>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Footer Area End Here -->



 <!-- Begin Scroll To Top -->
 <a class="scroll-to-top" href="">
     <i class="fa fa-angle-double-up"></i>
 </a>
 <!-- Scroll To Top End Here -->


 <!-- Global Vendor, plugins JS -->

 <!-- JS Files
    ============================================ -->

 <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
 <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
 <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
 <script src="assets/js/vendor/jquery.waypoints.js"></script>
 <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
 <script src="assets/js/plugins/wow.min.js"></script>
 <script src="assets/js/plugins/swiper-bundle.min.js"></script>
 <script src="assets/js/plugins/jquery.nice-select.js"></script>
 <script src="assets/js/plugins/parallax.min.js"></script>
 <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
 <script src="assets/js/plugins/tippy.min.js"></script>
 <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
 <script src="assets/js/plugins/mailchimp-ajax.js"></script>
 <script src="assets/js/plugins/jquery.counterup.js"></script>

 <!--Main JS (Common Activation Codes)-->
 <script src="assets/js/main.js"></script>
 <script src="sweetalert.min.js"></script>

 <script src="./main.js"></script>
 <?php
    require_once("./alert.php");
                             ?>