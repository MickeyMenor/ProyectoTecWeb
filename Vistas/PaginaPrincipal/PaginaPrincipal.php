<?php
    include('ControladorPaginaPrincipal.php');
    $controlador = new ControladorPaginaPrincipal();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php 
        include 'Metadatos/Metadatos.php';
    ?>
    <body>
        <div class="container">
            <?php 
                include 'Encabezado/Encabezado.php';
            ?>
            <section id="main-section">
                <h2 class="section-heading mb-4">
                    Detalle del producto
                </h2>
                <section class="mb-5">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            
                        </div>
                    </div>
                </section> 
            </section> 
                
                
                
                
                
                
  <!--Title-->
  <h2 class="section-heading mb-4">
    Main section
  </h2>

  <!-- Description -->
  <p>

  </p>

  <!--Section: Live preview-->
  <section class="">

    <!--Section: Block Content-->
    <section class="mb-5">

      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">

          <div id="mdb-lightbox-ui"><!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
		         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <!--<button class="pswp__button pswp__button--share" title="Share"></button>-->

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--
		            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
		                <div class="pswp__share-tooltip"></div>
		            </div>
		       		-->

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div></div>

          <div class="mdb-lightbox" data-pswp-uid="1">

            <div class="row product-gallery mx-1">

              <div class="col-12 mb-0">
                <figure class="view overlay rounded z-depth-1 main-img">
                  <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg" data-size="710x823">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg" class="img-fluid z-depth-1" style="transform-origin: center center 0px; transform: scale(1);">
                  </a>
                </figure>
                <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                  <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" data-size="710x823">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" class="img-fluid z-depth-1">
                  </a>
                </figure>
                <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                  <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" data-size="710x823">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" class="img-fluid z-depth-1">
                  </a>
                </figure>
                <figure class="view overlay rounded z-depth-1" style="visibility: hidden;">
                  <a href="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg" data-size="710x823">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg" class="img-fluid z-depth-1">
                  </a>
                </figure>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-3">
                    <div class="view overlay rounded z-depth-1 gallery-item">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg" class="img-fluid">
                      <div class="mask rgba-white-slight"></div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="view overlay rounded z-depth-1 gallery-item">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg" class="img-fluid">
                      <div class="mask rgba-white-slight"></div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="view overlay rounded z-depth-1 gallery-item">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg" class="img-fluid">
                      <div class="mask rgba-white-slight"></div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="view overlay rounded z-depth-1 gallery-item">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg" class="img-fluid">
                      <div class="mask rgba-white-slight"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="col-md-6">

          <h5>Fantasy T-shirt</h5>
          <p class="mb-2 text-muted text-uppercase small">Shirts</p>
          <ul class="rating">
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="fas fa-star fa-sm text-primary"></i>
            </li>
            <li>
              <i class="far fa-star fa-sm text-primary"></i>
            </li>
          </ul>
          <p><span class="mr-1"><strong>$12.99</strong></span></p>
          <p class="pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente illo. Sit
            error voluptas repellat rerum quidem, soluta enim perferendis voluptates laboriosam. Distinctio,
            officia quis dolore quos sapiente tempore alias.</p>
          <div class="table-responsive">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                  <td>Shirt 5407X</td>
                </tr>
                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                  <td>Black</td>
                </tr>
                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                  <td>USA, Europe</td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr>
          <div class="table-responsive mb-2">
            <table class="table table-sm table-borderless">
              <tbody>
                <tr>
                  <td class="pl-0 pb-0 w-25">Quantity</td>
                  <td class="pb-0">Select size</td>
                </tr>
                <tr>
                  <td class="pl-0">
                    <div class="def-number-input number-input safari_only mb-0">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                      <input class="quantity" min="0" name="quantity" value="1" type="number">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                    </div>
                  </td>
                  <td>
                    <div class="mt-1">
                      <div class="form-check form-check-inline pl-0">
                        <input type="radio" class="form-check-input" id="small" name="materialExampleRadios" checked="">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="small">Small</label>
                      </div>
                      <div class="form-check form-check-inline pl-0">
                        <input type="radio" class="form-check-input" id="medium" name="materialExampleRadios">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="medium">Medium</label>
                      </div>
                      <div class="form-check form-check-inline pl-0">
                        <input type="radio" class="form-check-input" id="large" name="materialExampleRadios">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="large">Large</label>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <button type="button" class="btn btn-primary btn-md mr-1 mb-2 waves-effect waves-light">Buy now</button>
          <button type="button" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light"><i class="fas fa-shopping-cart pr-2"></i>Add to
            cart</button>
        </div>
      </div>

    </section>
        </div>
    </body>
</html>