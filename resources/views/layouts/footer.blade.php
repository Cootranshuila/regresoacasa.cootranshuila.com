<footer class="clearfix">
    <div class="container">
        <p>© 2020 Cootranshuila</p>
        <ul>
            <li><a href="https://cootranshuila.com" class="animated_link">Cootranshuila</a></li>
            <li><a href="https://cootranshuila.com/#contacto" class="animated_link">Contactenos</a></li>
        </ul>
    </div>
</footer>
<!-- end footer-->

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->

<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/common_scripts.min.js') }}"></script>
<script src="{{ asset('assets/js/velocity.min.js') }}"></script>
<script src="{{ asset('assets/js/common_functions.js') }}"></script>

@yield('add-scriots')

<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script>
"use strict";
$(".team-carousel").owlCarousel({
        items: 1,
        loop: false,
        margin: 10,
        autoplay: false,
        smartSpeed: 300,
        responsiveClass: false,
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    });
</script>