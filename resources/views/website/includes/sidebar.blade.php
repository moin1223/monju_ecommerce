<nav class="sidebar dark_sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html">
            <img class="ms-5" src="{{ asset('/frontend/images/Dream-Walkers-Logo.png') }}" alt="Dream-Walkers"
                style="width: 100px; height: auto;">


        </a>
        <a class="small_logo" href="index.html">
            <img src={{ asset('/frontend/images/Dream-Walkers-Logo.png') }} alt="Dream-Walkers"
                style="width: 50px; height: auto;">
        </a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        @include('website.component.sidebar-component', [
            'title' => 'Product',
            'links' => [
                ['title' => 'List', 'route' => 'product.index', 'link' => route('product.index')],
                //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                [
                    'title' => 'Create',
                    'route' => 'product.create',
                    'link' => route('product.create'),
                ],
            ],
            'active_links' => ['product.create', route('product.create')],
        ])
        @include('website.component.sidebar-component', [
            'title' => 'Slider',
            'links' => [
                ['title' => 'List', 'route' => 'slider.index', 'link' => route('slider.index')],
                //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                [
                    'title' => 'Create',
                    'route' => 'slider.create',
                    'link' => route('slider.create'),
                ],
            ],
            'active_links' => ['slider.create', route('slider.create')],
        ])
        @include('website.component.sidebar-component', [
            'title' => 'Order',
            'links' => [
                ['title' => 'List', 'route' => 'order.index', 'link' => route('order.index')],
                //  ['title' => 'Check new request', 'route' => 'checkRequest', 'link' => route('checkRequest')],
                // [
                //     'title' => 'Create',
                //     'route' => 'slider.create',
                //     'link' => route('slider.create'),
                // ],
            ],
            'active_links' => ['order.index', route('order.index')],
        ])


    </ul>
</nav>
