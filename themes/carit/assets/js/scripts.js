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
$('.js-nav-category-spoiler > div').click(function () { 
    $('.js-nav-category-spoiler > div').removeClass('-active');
    $(this).toggleClass('-active');
    var thisID = $(this).attr('id');
    console.log(thisID);
    $('.content > div').removeClass('-active');
    $('.content > ' + '.' + thisID).addClass('-active');
});