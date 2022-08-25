var burgerButton = document.getElementById("#burgetButton");
var htmlTag = document.getElementsByTagName('html')[0];

burgerButton.addEventListener('click', function handleClick(event) {
    htmlTag.classList.add("left-panel-show");
});

function closeLeftPanel() {
    htmlTag.classList.remove("left-panel-show");
}

jQuery('.simple-slider').slick({
    slidesToShow: 1,
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 5000,
});
jQuery('.js-nav-category-spoiler > div').click(function () { 
    jQuery('.js-nav-category-spoiler > div').removeClass('-active');
    jQuery(this).toggleClass('-active');
    var thisID = jQuery(this).attr('id');
    console.log(thisID);
    jQuery('.content > div').removeClass('-active');
    jQuery('.content > ' + '.' + thisID).addClass('-active');
});

// + - buttons for add cart and remove cart

;
(function($) {
    "use strict";
    var CARIT_THEM = {
        init: function() {
            this.carit_woo_quantily();
        },
        carit_woo_quantily: function() {
            $('body').on('click', '.quantity .quantity-plus', function(e) {
                var _this = $(this).closest('.quantity').find('input.qty'),
                    _value = parseInt(_this.val()),
                    _max = parseInt(_this.attr('max')),
                    _step = parseInt(_this.data('step')),
                    _value = _value + _step;
                if (_max && _value > _max) {
                    _value = _max;
                }
                _this.val(_value);
                _this.trigger("change");
                e.preventDefault();
            });
            $(document).on('change', function() {
                $('.quantity').each(function() {
                    var _this = $(this).find('input.qty'),
                        _value = _this.val(),
                        _max = parseInt(_this.attr('max'));
                    if (_value > _max) {
                        $(this).find('.quantity-plus').css('pointer-events', 'none')
                    } else {
                        $(this).find('.quantity-plus').css('pointer-events', 'auto')
                    }
                })
            });
            $('body').on('click', '.quantity .quantity-minus', function(e) {
                var _this = $(this).closest('.quantity').find('input.qty'),
                    _value = parseInt(_this.val()),
                    _min = parseInt(_this.attr('min')),
                    _step = parseInt(_this.data('step')),
                    _value = _value - _step;
                if (_min && _value < _min) {
                    _value = _min;
                }
                if (!_min && _value < 0) {
                    _value = 0;
                }
                _this.val(_value);
                _this.trigger("change");
                e.preventDefault();
            });
        },
    };
    document.addEventListener("DOMContentLoaded", function(event) {
        CARIT_THEM.init();
    });
})(jQuery, window, document);
    
var timeout;

jQuery(document).ready(function ($) {
    jQuery(function ($) {
        jQuery('.woocommerce').on('change', 'input.qty', function () {

            if (timeout !== undefined) {
                clearTimeout(timeout);
            }

            timeout = setTimeout(function () {
                jQuery("[name='update_cart']").trigger("click");
            }, 1000); // 1 second delay, half a second (500) seems comfortable too

        });
    });
});