(function ($) {

    /* Start carousel slider */
    const ElementCarouselSlider = function( $scope, $ ) {

        const element_slides = $scope.find( '.custom-owl-carousel' );

        $( document ).general_owlCarousel_custom( element_slides );

    };

    /* Project gallery light slider */
    const ElementProjectGallery = function ($scope, $) {
        const project_gallery = $scope.find( '.project-gallery' );

        project_gallery.each( function () {
            const selector = $(this).find('.lslide');

            $(this).lightSlider({
                gallery: true,
                item: 1,
                loop:true,
                thumbItem: 6,
                slideMargin: 0,
                enableDrag: true,
                currentPagerPosition:'left',
                controls: false,
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: selector
                    });
                }
            });
        } )
    };

    $( window ).on( 'elementor/frontend/init', function() {

        /* Element slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/land-slides.default', ElementCarouselSlider );

        /* Element post carousel */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/land-post-carousel.default', ElementCarouselSlider );

        /* Element testimonial slider */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/land-testimonial-slider.default', ElementCarouselSlider );

        /* Element carousel images */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/land-carousel-images.default', ElementCarouselSlider );

        /* Element project overview */
        elementorFrontend.hooks.addAction( 'frontend/element_ready/land-project-overview.default', ElementProjectGallery );

    } );

})( jQuery );