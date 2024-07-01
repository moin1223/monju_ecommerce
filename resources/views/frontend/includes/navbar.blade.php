<div id="navbar-placeholder">
<section class="primaryBgColor mx-auto navSection">
    <div class="primaryBgColor">
      <h1 class="text-center directCall" direction="left">
        সরাসরি অর্ডার করতে যোগাযোগ করুন-01876506993
      </h1>
  
      <nav class="navbar navbar-expand-lg align-items-center">
        <div class="container-fluid navBar align-items-center">
         
          <button
            class="navbar-toggler buttonBgColor menuBtn cartToggle"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="../index.html">Pure Organic</a>
          <a href="{{ route('cart.show') }}">
          <div class="cart align-items-center cartBoxlarge">
            <i class="bi bi-basket-fill cartIcon"></i>
            <h6 class="cart-quantity">{{ $cartLength }}</h6>
          </div>
          </a>
          <form method="GET" action="{{route('home-page')}}" class="d-none d-lg-flex form">
            <input  name="query" :value="request('query')" type="search" class="input" placeholder="এইখানে সার্চ করুন..." />
            <button type="submit" class="buttonBgColor"><i class="bi bi-search"></i></button>
        </form>
          <a href="{{ route('cart.show') }}">
          <div class="d-none d-lg-flex cart align-items-center">
            <i class="bi bi-basket-fill cartIcon"></i>
            <h6 class="cart-quantity">{{ $cartLength }}</h6>
          </div>
          </a>
        </div>
      </nav>
    </div>
    <!-- menu items for toggle start  -->
    <div class="d-lg-flex">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex me-auto mb-2 mb-lg-0 toggleMenu">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home-page') }}">Home</a>
          </li>

      </ul>
      <form method="GET" action="{{route('home-page')}}" class="d-flex d-lg-none" role="search">
          <input name="query" :value="request('query')"  type="search" class="input orm-control me-2" placeholder="এইখানে সার্চ করুন..." />
          <button  type="submit" class="buttonBgColor"><i class="bi bi-search"></i></button>
      </form>
      </div>
    </div>
    <!-- menu items for toggle end  -->
  
    <!-- menu items for lg screen start -->
    <div class="d-none d-lg-block m-auto mx-auto menuItems" id="">
      <ul class="d-flex gap-4 mb-2 mb-lg-0 mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home-page') }}">Home</a>
      </ul>
    </div>
    <!-- menu items for lg screen  end -->
  </section>  
</div>
