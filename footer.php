<footer id="footer">
</footer><!--#footer -->
<?php wp_footer(); ?>
<script>
    var swiperThumbnail = new Swiper(".swiperThumbnail", {
      slidesPerView: 3,
      spaceBetween: 8,
      freeMode: true,
      watchSlidesProgress: true,
      autoplay: {                         
            delay: 2000,  
        }, 
    });

    var swiperMain = new Swiper(".swiperMain", {
      effect: "fade",
      loop: true,
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      thumbs: {
          swiper: swiperThumbnail,
        },
    });
</script>
<!-- swiper -->
</body>
</html>