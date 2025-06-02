<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @php
        $currentCompany = app('currentCompany');
    @endphp

    <title>Mokaab | {{ $currentCompany->name }}</title>

    {{-- <link rel="icon" href="{{ asset("themes/$theme/img/favicon.png")}}"> --}}
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/animate.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/flaticon.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/slick.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/gijgo.min.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/nice-select.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/all.css")}}">
    <link rel="stylesheet" href="{{ asset("themes/$theme/css/style.css")}}">

    <style>
        :root {
            --primary-color: {{ $settings->primary_color ?? '#ff6426' }};
        }
    
        body {
            color: var(--primary-color);
        }

        .main_menu .main-menu-item ul li a.active,
        .main_menu .main-menu-item ul li a:hover {
            color: var(--primary-color) !important;
        }

        .food_menu .nav-tabs .active {
            color: var(--primary-color) !important;
        }

        .section_tittle h2::after {
            background-color: var(--primary-color) !important;
        }
    
        .navbar-nav .nav-link {
            color: #000;
            transition: 0.3s;
        }
    
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
            font-weight: bold;
        }
    
        .product-prices span {
            color: var(--primary-color);
        }
    
        .single_blog_item .single_blog_text {
            border-color: var(--primary-color);
        }
    
        a {
            text-decoration-color: var(--primary-color);
        }
        a.active, a:hover {
            color: var(--primary-color) !important;
        }
    
        h5 {
            color: var(--primary-color) !important;
        }

        .btn_3, .btn {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }
    
        .btn_3:hover, .btn:hover {
            background-color: #fff;
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        #productModal{
            z-index: 10000;
        }

        .footer-area .copyright_part_text a {
            color: var(--primary-color) !important;
        }
        
        .product-image {
        width: 100%;
        height: 250px
        object-fit: cover;
        border-radius: 10px;
    }

    .banner_part {
        height: 880px;
        position: relative;
        @if(isset($banner) && $banner->image && $banner->image->path)
            background-image: url("{{ asset('storage/' . $banner->image->path) }}");
        @else
            background-image: url("{{ asset('themes/minimal/img/banner.png') }}");
        @endif
        background-repeat: no-repeat;
        background-size: 41%;
        background-position: top right;
    }

    .banner_part {
        position: relative;
        overflow: hidden;
    }

    @media (max-width: 576px) {
  .banner_part {
    height: 650px;
    background-image: none;
    background-color: #f0eed4;
  }
}

    .border-primary{
        border-color: var(--primary-color) !important;
    }
    </style>
    
</head>

<body>
    
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="">
                            @if ($company->logo && $company->logo->path)
                                <img src="{{ asset('storage/' . $currentCompany->logo->path) }}" alt="Logo" width="50" height="50" class="rounded-circle border border-2 border-primary shadow-sm">
                            @else
                                <img src="{{ asset('assets/img/small-logos/logo-jira.svg') }}" alt="No Logo" width="50" height="50" class="rounded-circle border border-2 border-primary shadow-sm">
                            @endif
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#our-emp">الموظفين</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#our-products">المنتجات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about-us">نبذة عنا</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#latest-pro">أحدث المنتجات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#main">الرئيسية</a>
                                </li>
                            </ul>
                        </div>                       
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <section class="banner_part" id="main">
        {{-- <div class="banner-image-wrapper">
            @if($banner && $banner->image && $banner->image->path)
                <img src="{{ asset('storage/' . $banner->image->path) }}" alt="Banner Image" class="banner-image">
            @else
                <img src="{{ asset('themes/minimal/img/banner.png') }}" alt="Default Banner Image" class="banner-image">
            @endif
        </div>         --}}
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5 class="custom-h5" >{{$banner->title}}</h5>
                            <h1 class="custom-h1">{{$banner->main_text}}</h1>
                            <p class="custom-p">{{$banner->sub_text}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="exclusive_item_part blog_item_section" id="latest-pro">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_tittle">
                        <p class="custom-p">أحدث المنتجات</p>
                        <h2 class="custom-h2"> تصاميم جديدة تخطف الأنظار</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products->take(3) as $product)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_blog_item">
                            <a href="{{ route('products.show', ['company' => $company->domain, 'product' => $product->id]) }}">
                                <div class="single_blog_img" style="cursor: pointer;">
                                    <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->path) : asset('themes/' . $theme . '/img/placeholder.png') }}" alt="{{ $product->name }}">
                                </div>
                            </a>                            
                            <div class="single_blog_text">
                                <h3>{{ $product->name }}</h3>
                            
                                <h5 class="product-prices" style="display: flex; flex-direction: column; line-height: 1.4;">
                                    @if($product->discount && $product->discount < $product->price)
                                        <span style="font-weight: bold; color: #000;">{{ $product->discount }} </span>
                                        <span style="color: red; text-decoration: line-through;">{{ $product->price }} </span>
                                    @else
                                        <span style="font-weight: bold; color: #000;">{{ $product->price }} </span>
                                    @endif
                                </h5>
                            
                                <p>{{ Str::limit($product->description, 100) }}</p>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <section class="about_part gray_bg" id="about-us">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-5 offset-lg-1">
                    <div class="about_img">
                        @if($settings && $settings->image && $settings->image->path)
                            <img src="{{ asset('storage/' . $settings->image->path) }}" alt="Banner Image" class="banner-image">
                        @else
                            <img src="{{ asset('themes/minimal/img/banner.png') }}" alt="Default Banner Image" class="banner-image">
                        @endif
                    </div>
                </div>
                <div class="col-sm-8 col-lg-4">
                    <div class="about_text">
                        <h5 class="custom-h5">نبذة عنا</h5>
                        <h2 class="custom-h2">
                            {{$company->name}} 
                        </h2>
                        {{-- <h4 class="custom-h4">Satisfying people hunger for simple pleasures</h4> --}}
                        <p class="custom-p">{{$settings->about_us}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="food_menu" id="our-products">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="section_tittle">
                        <p class="custom-p">منتجاتنا</p>
                        <h2 class="custom-h2">أرقى الأنواع </h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="custom-nav nav-tabs food_menu_nav" id="myTab" role="tablist">
                        <a class="active category-tab" data-id="all" data-toggle="tab" href="#" role="tab"
                            aria-controls="Special" aria-selected="true">الكل</a>
                        @foreach ($categories as $cat)
                            <a class="category-tab" data-id="{{$cat->id}}" data-toggle="tab" href="#" role="tab"
                                aria-controls="Special" aria-selected="false">{{$cat->name}}</a>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active single-member" id="Special" role="tabpanel"
                            aria-labelledby="Special-tab">
                            <div class="row" id="category-products">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="chefs_part blog_item_section section_padding" id="our-emp">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_tittle">
                        <p class="custom-p">فريقنا</p>
                        <h2 class="custom-h2">صنّاع الفخامة الحقيقية</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($employees as $emp)                    
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_blog_item">
                            <div class="single_blog_img">
                                <img src="{{ $emp->image ? asset('storage/' . $emp->image->path) : asset('themes/minimal/img/employee.png') }}" alt="{{ $emp->name }}">
                            </div>
                            <div class="single_blog_text text-center">
                                <h3>{{$emp->name}}</h3>
                                <p>{{$emp->position}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-md-2 col-lg-3 text-center">
                    <div class="single-footer-widget footer_2">
                        <h4>روابط</h4>
                        <div class="contact_info">
                            <ul>
                                <li><a href="#main">الرئيسية</a></li>
                                <li><a href="#latest-pro"> أحدث المنتجات</a></li>
                                <li><a href="#our-products">المنتجات</a></li>
                                <li><a href="#our-emp">الموظفين</a></li>
                                <li><a href="#about-us">نبذة عنا</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="single-footer-widget footer_2">
                        <h4>اتصل بنا</h4>
                        <div class="contact_info d-flex flex-column align-items-center">
                            <p>{{$settings->address_1}}</p>
                            <p>{{$settings->phone_1}} </p>
                            <p>{{$settings->email}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-3 col-lg-3 text-right">
                    <div class="single-footer-widget footer_1">
                        <h4>نبذة عنا</h4>
                        <p>{{$settings->about_us}}</p>
                    </div>
                </div>
            </div>
            <div class="copyright_part_text">
                <div class="row">
                    <div class="col-lg-6 text-right">
                        <p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://www.linkedin.com/in/hkmt-ali/" target="_blank">HKMT ALI</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright_social_icon text-left">
                            @if(!empty($settings->facebook_url))
                                <a href="{{ $settings->facebook_url }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(!empty($settings->instagram_url))
                                <a href="{{ $settings->instagram_url }}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset("themes/$theme/js/jquery-1.12.1.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/popper.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/bootstrap.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/jquery.magnific-popup.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/swiper.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/masonry.pkgd.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/owl.carousel.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/slick.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/gijgo.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/jquery.nice-select.min.js")}}"></script>
    <script src="{{ asset("themes/$theme/js/custom.js")}}"></script>
    <script>
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
        
                const categoryId = this.dataset.id;
        
                document.querySelectorAll('.category-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
        
                const url = categoryId === "all" 
                    ? `/products/by-category` 
                    : `/products/by-category?category_id=${categoryId}`;
                fetch(url)
                    .then(res => res.json())
                    .then(data => {
                        const container = document.getElementById('category-products');
                        container.innerHTML = '';
        
                        if (data.products.length === 0) {
                            container.innerHTML = '<p class="text-center w-100">لا توجد منتجات ضمن هذه الفئة.</p>';
                        }
        
                        data.products.forEach(product => {
                            const image = product.images.length
                                ? `/storage/${product.images[0].path}`
                                : `/themes/default/img/placeholder.png`;

                            const discount = product.discount && product.discount < product.price
                                ? `<span style="font-weight: bold; color: #000;">${product.discount}</span>
                                <span style="color: red; text-decoration: line-through;">${product.price}</span>`
                                : `<span style="font-weight: bold; color: #000;">${product.price}</span>`;

                                container.innerHTML += `
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="single_blog_item">
                                            <a href="/items/${product.id}/show">
                                                <div class="single_blog_img" style="cursor: pointer;">
                                                    <img class="product-image" src="${image}" alt="${product.name}">
                                                </div>
                                            </a>
                                            <div class="single_blog_text">
                                                <h3>${product.name}</h3>
                                                <h5 class="product-prices" style="display: flex; flex-direction: column; line-height: 1.4;">
                                                    ${discount}
                                                </h5>
                                                <p>${product.description.substring(0, 100)}...</p>
                                            </div>
                                        </div>
                                    </div>
                                `;

                        });
                    });
                });
            });
        
            document.querySelector('.category-tab[data-id="all"]').click();
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
                const sections = Array.from(document.querySelectorAll("section[id]"));
            
                function onScroll() {
                    const scrollY = window.pageYOffset;
            
                    let currentSectionId = null;
            
                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 150;
                        const sectionHeight = section.offsetHeight;
            
                        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                            currentSectionId = section.getAttribute("id");
                        }
                    });
            
                    navLinks.forEach(link => {
                        const href = link.getAttribute("href").replace("#", "");
                        if (href === currentSectionId) {
                            link.classList.add("active");
                        } else {
                            link.classList.remove("active");
                        }
                    });
                }
            
                window.addEventListener("scroll", onScroll);
                onScroll();
            
                navLinks.forEach(link => {
                    link.addEventListener("click", function () {
                        navLinks.forEach(l => l.classList.remove("active"));
                        this.classList.add("active");
                    });
                });
            });
        </script>
        
</body>

</html>