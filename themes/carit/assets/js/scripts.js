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