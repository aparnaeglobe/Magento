(function  () {
    require(["jquery","owlcarousel"],function(jQuery) {
        jQuery(document).ready(function() {
            jQuery("#banner").owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                items: 1,
            });
            
            jQuery(".category-perant").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 4,
                    },
                    700: {
                        items: 5,
                    },
                    900: {
                        items: 6,
                    },
                    1000: {
                        items: 7,
                    },
                },
            });
            
            jQuery(".product-slider").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                       autoWidth:true,
                    },
                    600: {
                        autoWidth:true,
                    },
                    800: {
                        items: 3,
                    },
                    1000: {
                        items: 4,
                    },
                    1250: {
                        items: 5,
                    },
                },
            });
            
            jQuery(".brand-main").owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 4,
                    },
                    700: {
                        items: 5,
                    },
                    900: {
                        items: 6,
                    },
                    1000: {
                        items: 7,
                    },
                },
            });
        });
    });
})();
