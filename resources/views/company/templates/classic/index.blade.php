<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @php
        $currentCompany = app('currentCompany');
    @endphp

    <title>Mokaab | {{ $currentCompany->name }}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ asset("themes/$theme/img/favicon.png") }}" rel="icon">
  <link href="{{ asset("themes/$theme/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Mukta:wght@200;300;400;500;600;700;800&family=Abel:wght@400&display=swap" rel="stylesheet">

  <link href="{{ asset("themes/$theme/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("themes/$theme/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{ asset("themes/$theme/vendor/aos/aos.css") }}" rel="stylesheet">
  <link href="{{ asset("themes/$theme/vendor/swiper/swiper-bundle.min.css") }}" rel="stylesheet">
  <link href="{{ asset("themes/$theme/vendor/glightbox/css/glightbox.min.css") }}" rel="stylesheet">

  <link href="{{ asset("themes/$theme/css/main.css") }}" rel="stylesheet">

  <style>
    :root {
        --primary-color: {{ $settings->primary_color ?? '#ff6426' }};
    }

    a {
        color: var(--primary-color);
    }

    a:hover {
        color: #fff;
    }

    .navmenu .active{
        color: var(--primary-color);
    }

    body {
        color: var(--primary-color);
    }

    .border-primary {
        --bs-border-opacity: 1;
        border-color: var(--primary-color) !important;
    }

    .scroll-top,
    .about .about-image-wrapper .mission-card,
    .hero .hero-content .hero-buttons .primary-btn,
    .hero .hero-content .subtitle span::after{
        background-color: var(--primary-color) !important;
    }

    .about .about-content .tag-badge,
    .hero .hero-visual .image-wrapper .floating-element i{
        color: var(--primary-color);
    }

    .team .team-member .member-content span,
    .features-alt .tab-content .content-box .features-list li i,
    .features-alt .nav-tabs .nav-link:hover h4,
    .hero .hero-content .title .highlight{
        color: var(--primary-color);
    }

    .hero .hero-content .title .highlight::after {
        background-color: var(--primary-color);
        opacity: 0.3;
    }

    .team .team-header h2:before,
    .features-alt .tab-content .content-box h3::after,
    .features-alt .nav-tabs .nav-link:hover .icon-box,
    .features-alt .nav-tabs .nav-link.active{
        background: var(--primary-color);
    }

    .team .team-controls .team-control-btn{
        border-color: var(--primary-color);
        color: var(--primary-color);
    }
    .team .team-controls .team-control-btn:hover{
        background: var(--primary-color);
    }

    .footer .social-links a:hover{
        color: var(--primary-color);
        border-color: var(--primary-color);
    }
    </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('/') }}" class="logo d-flex align-items-center">
        @if ($company->logo && $company->logo->path)
            <img src="{{ asset('storage/' . $currentCompany->logo->path) }}" alt="Logo" width="100" height="100" class="rounded-circle border border-2 border-primary shadow-sm">
        @else
            <img src="{{ asset('assets/img/small-logos/logo-jira.svg') }}" alt="No Logo" width="50" height="50" class="rounded-circle border border-2 border-primary shadow-sm">
        @endif
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="#hero">الرئيسية</a></li>
            <li><a href="#about">نبذة عنا</a></li>
            <li><a href="#products">المنتجات</a></li>
            <li><a href="#employees">الموظفين</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content text-end" data-aos="fade-up" data-aos-delay="100">
                    <div class="subtitle">
                        <span>{{$currentCompany->name}}</span>
                    </div>

                    <h1 class="title">
                        <span class="highlight">{{$banner->title}}</span>
                    </h1>

                    <div class="description">
                        <span>{{$banner->title}}</span>
                        <p>{{$banner->sub_text}}</p>
                    </div>

                    <div class="hero-buttons d-flex justify-content-end gap-2">
                        <a href="#about" class="secondary-btn">
                            نبذة عنا
                        </a>
                        <a href="#products" class="primary-btn">
                         المنتجات
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 hero-visual" data-aos="fade-up" data-aos-delay="200">
                <div class="image-wrapper">
                    @if($banner && $banner->image && $banner->image->path)
                        <img src="{{ asset('storage/' . $banner->image->path) }}" alt="Banner Image" class="main-image">
                    @else
                        <img src="{{ asset('themes/minimal/img/banner.png') }}" alt="Default Banner Image" class="banner-image">
                    @endif
                    {{-- <img src="{{ asset("themes/$theme/img/misc/misc-square-16.webp") }}" alt="Creative Design" class="main-image"> --}}

                    <div class="floating-element top-left">
                    <i class="bi bi-star-fill"></i>
                    </div>

                    <div class="floating-element bottom-right">
                    <i class="bi bi-circle-fill"></i>
                    </div>
                </div>

                
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="description-title">نبذة عنا</span>
        <h2>نبذة عنا</h2>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-start  gy-5">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="about-image-wrapper position-relative">
                @if ($settings->image && $settings->image->path)
                    <img src="{{ asset('storage/' . $settings->image->path) }}" alt="About Us" class="img-fluid rounded-4">
                @else
                    <img src="{{ asset('themes/minimal/img/banner.png') }}" alt="About Us" class="img-fluid rounded-4">
                @endif

            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-lg-4 text-end">
              <div class="tag-badge" data-aos="fade-up" data-aos-delay="100">نظرة حول الشركة</div>
              <div class="about-info" data-aos="fade-up" data-aos-delay="300">
                <p>{{$settings->about_us}}</p>
              </div>
            </div>
            <div class="about-image-wrapper position-relative">
                <div class="mission-card">
                    <div class="mission-content text-end">
                        <h4>أهدافنا</h4>
                        <p>تقديم حلولًا مبتكرة في عالم السيراميك تعزز من المتانة والجمال وتواكب متطلبات السوق الحديثة</p>
                    </div>
                    <div class="mission-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    

    <!-- Features Alt Section -->
    <section id="products" class="features-alt section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="container section-title" data-aos="fade-up">
            <span class="description-title">المنتجات</span>
            <h2>المنتجات</h2>
          </div>
        <div class="row g-4">
            <div class="col-lg-10">
                <div class="tab-content" id="category-products" data-aos="fade-up" data-aos-delay="300">
                    
                </div>
            </div>
            
          
            <div class="col-lg-2">
                <ul class="nav nav-tabs flex-column" role="tablist" data-aos="fade-right" data-aos-delay="200">
                    @foreach ($categories as $index => $cat)
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ $index == 0 ? 'active' : '' }}" 
                               data-category-id="{{ $cat->id }}">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="me-3">
                                        <h4>{{ $cat->name }}</h4>
                                    </div>
                                    <div class="icon-box">
                                        <i class="bi bi-heart"></i>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>

    </section><!-- /Features Alt Section -->

    <!-- Team Section -->
    <section id="employees" class="team section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="team-header" data-aos="fade-up" data-aos-delay="200">
          <div class="row align-items-center">
            <div class="col-lg-6 d-flex justify-content-lg-start">
                <div class="team-controls">
                  <button class="team-control-btn team-prev"><i class="bi bi-chevron-left"></i></button>
                  <button class="team-control-btn team-next"><i class="bi bi-chevron-right"></i></button>
                </div>
              </div>
            <div class="col-lg-6 d-flex flex-column align-items-end">
              <h2>الموظفين</h2>
              <p>فريق من المحترفين والمميزين للوصول إلى أجود المنتجات</p>
            </div>
          </div>
        </div>

        <div class="team-slider swiper init-swiper" data-aos="fade-up" data-aos-delay="300">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 700,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "navigation": {
                "nextEl": ".team-next",
                "prevEl": ".team-prev"
              },
              "breakpoints": {
                "576": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                },
                "992": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 4,
                  "spaceBetween": 30
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            @foreach($employees as $emp)
              <div class="swiper-slide">
                <div class="team-member">
                  <div class="member-image">
                    @if ($emp->image)
                        <img src="{{ asset('storage/' . $emp->image->path) }}" class="img-fluid" alt="{{ $emp->name }}" loading="lazy">
                    @else
                        <img src="{{ asset('themes/minimal/img/employee.png') }}" class="img-fluid" alt="{{ $emp->name }}" loading="lazy">
                    @endif
                  </div>
                  <div class="member-content text-center">
                    <h3>{{ $emp->name }}</h3>
                    <span>{{ $emp->position }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          
        </div>

      </div>
    </section><!-- /Team Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-12 footer-contact text-center">
            <h4>تواصل معنا</h4>
            <p>{{$settings->address_1}}</p>
            @if ($settings->address_2)
            <p>{{$settings->address_2}}</p>
            @endif
            <p class="mt-4"><strong>هاتف:</strong> <span>{{$settings->phone_1}}</span></p>
            <p><span>{{$settings->email}}</span> <strong>:الإيميل</strong></p>
        </div>
        <div class="col-lg-4 col-6 footer-links text-center">
            <h4>روابط</h4>
            <ul class="list-unstyled d-inline-block text-end">
                <li><a href="#hero">الرئيسية</a></li>
                <li><a href="#about">نبذة عنا</a></li>
                <li><a href="#products">المنتجات</a></li>
                <li><a href="#employees">الموظفين</a></li>
            </ul>
        </div>
        
        <div class="col-lg-4 col-md-12 footer-about">
            <a href="{{ route('/') }}" class="logo d-flex align-items-center justify-content-end">
              <span class="sitename">{{$currentCompany->name}}</span>
            </a>
            <p class="text-end">{{$settings->about_us}}</p>
            <div class="social-links d-flex mt-4 align-items-center justify-content-center">
                @if ($settings->facebook_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank"><i class="bi bi-facebook"></i></a>
                @endif
                @if ($settings->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank"><i class="bi bi-instagram"></i></a>
                @endif
            </div>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://www.linkedin.com/in/hkmt-ali/" target="_blank">HKMT ALI</a>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="{{ asset("themes/$theme/#") }}" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset("themes/$theme/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/php-email-form/validate.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/aos/aos.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/purecounter/purecounter_vanilla.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/imagesloaded/imagesloaded.pkgd.min.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/isotope-layout/isotope.pkgd.min.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/swiper/swiper-bundle.min.js") }}"></script>
  <script src="{{ asset("themes/$theme/vendor/glightbox/js/glightbox.min.js") }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset("themes/$theme/js/main.js") }}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".nav-link[data-category-id]");
    
        navLinks.forEach(link => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
    
                // Set active class
                navLinks.forEach(l => l.classList.remove("active"));
                this.classList.add("active");
    
                const categoryId = this.getAttribute("data-category-id");
    
                fetch(`/products/by-category?category_id=${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        renderProducts(data.products);
                    })
                    .catch(error => {
                        console.error("Error loading products:", error);
                    });
            });
        });
    
        // Load the first category automatically
        navLinks[0]?.click();
    
        function renderProducts(products) {
    const container = document.getElementById("category-products");
    container.innerHTML = '';

    if (!products.length) {
        container.innerHTML = `<div class="d-flex justify-content-center alert alert-info alin-items-center">لا توجد منتجات في هذه الفئة.</div>`;
        return;
    }

    for (let i = 0; i < products.length; i += 2) {
        const product1 = products[i];
        const product2 = products[i + 1];

        const productHtml = (product) => {
            const imagePath = product.images?.[0]?.path
                ? `/storage/${product.images[0].path}`
                : '';

            return `
                <div class="col-lg-6">
                    <a href="/items/${product.id}/show">
                        <div class="tab-pane fade show active mb-3" role="tabpanel">
                            <div class="content-box">
                                <div class="row g-4">
                                    <div class="col-lg-6 text-end">
                                        <h3>${product.name}</h3>
                                        <ul class="features-list">
                                            ${product.discount ? `
                                                <li class="d-flex justify-content-end">
                                                    <span class="me-3 text-decoration-line-through">${product.price}</span>
                                                    <i class="bi bi-x-circle"></i>
                                                </li>
                                                <li class="d-flex justify-content-end">
                                                    <span class="me-3">${product.discount}</span>
                                                    <i class="bi bi-check2-circle"></i>
                                                </li>
                                            ` : `
                                                <li class="d-flex justify-content-end">
                                                    <span class="me-3">${product.price}</span>
                                                    <i class="bi bi-check2-circle"></i>
                                                </li>
                                            `}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="image-box fixed-image-box">
                                            <img src="${imagePath}" alt="${product.name}" class="border product-image img-fluid" loading="lazy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            `;
        };

        container.innerHTML += `
            <div class="row gy-4">
                ${productHtml(product1)}
                ${product2 ? productHtml(product2) : ''}
            </div>
        `;
    }
}

    });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
          const navLinks = document.querySelectorAll(".navmenu a");
          const sections = Array.from(navLinks).map(link => {
            const id = link.getAttribute("href").replace("#", "");
            return document.getElementById(id);
          });
      
          const observer = new IntersectionObserver(
            entries => {
              entries.forEach(entry => {
                const id = entry.target.getAttribute("id");
                const link = document.querySelector(`.navmenu a[href="#${id}"]`);
      
                if (entry.isIntersecting) {
                  navLinks.forEach(l => l.classList.remove("active"));
                  link.classList.add("active");
                }
              });
            },
            {
              rootMargin: "-50% 0px -50% 0px", // middle of screen
              threshold: 0
            }
          );
      
          sections.forEach(section => {
            if (section) observer.observe(section);
          });
        });
      </script>
      
    
</body>

</html>

