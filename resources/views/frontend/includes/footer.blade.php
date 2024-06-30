 
             <!-- Footer Section -->
             <div class="footer" id="footer">
              <footer class="container footer">
                <div
                  class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 g-2 g-lg-3"
                >
                  <div class="col">
                    <div class="p-2 footerH4">
                      <h4>About us</h4>
                      <p>
                        <li class="nav-item">
                          <a class="nav-link" href="../Components/About.html">About us</a>
                        </li>
                      </p>
                      <p>Contact us</p>
                      <p>Returns & Refunds</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="p-2 footerH4">
                      <h4>More Products</h4>
                      <p>Popular Products</p>
                      <p>Contact us</p>
                      <p>Germany Homeo Medicine</p>
                      <p>Hair Care</p>
                    </div>
                  </div>
                  <div class="col">
                    <div class="p-2 footerH4">
                      <h4>Our Facebook</h4>
                    </div>
                  </div>
                </div>
                <div class="text-center bottomFooter">
                  <a href="">Designed and Developed by Kutub Uddin</a>
                </div>
              </footer>
            </div>
               <!-- underFooter -->
      <div id="underFooter">
        <div class="d-flex justify-content-center align-content-center">
          <div class="d-flex justify-content-between  overFooter align-content-center w-75">
              <div>
                <a href="tel:0043245345">
                  <button type="button" class="btn overFooterBg position-relative">
                    <i class="bi bi-telephone"></i>
                  </button>
                  
                </a>
              </div>
            <div>
              <a href="https://wa.me/01987493345" target="_blank" rel="noopener noreferrer">
                <button type="button" class="btn overFooterBg position-relative">
                  <i class="bi bi-whatsapp "></i> 
                </button>
              </a>
            </div>
            {{-- <a href="{{ route('cart.show') }}">
              <div class="cart align-items-center cartBoxlarge">
                <i class="bi bi-basket-fill cartIcon"></i>
                <h6 class="cart-quantity">{{ $cartLength }}</h6>
              </div>
              </a> --}}
            
            <button type="button" class="btn  position-relative overFooterBg">
              <a href="{{ route('cart.show') }}">
              <div class="cart align-items-center cartBoxlarge">
                <i class="bi bi-basket-fill cartIcon"></i>
                <h6 class="cart-quantity">{{ $cartLength }}</h6>
              </div>
              </a>
            </button>
            <button type="button" class="btn  position-relative overFooterBg"
            type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="bi bi-list"></i> 
            </button>

            
          </div>
        </div>
      </div>

      <!-- scrolldown  -->
      <div id="scrolldown">
        <div class="scrollDownIcon">
          <i class="bi bi-arrow-up"></i>
        </div>
      </div>


            