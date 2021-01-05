
$(document).ready(function () { //when document is ready

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $("#team-slider").owlCarousel({ //owlCarousel settings
        items: 5, //by default there are 3 slides display.
        autoplay: true, //the slides will change automatically.
        smartSpeed: 700, //speed of changing wil be 700
        loop: true, //infinite loop; after the last slide, first slide starts
        autoplayHoverPause: true, //when you put mouse over Carousel, slide changing will stop
        responsive: { //responsiveness as screen size changes
            // min-width: 0px
            0: {
                items: 1 //on devices with width 0 to 579px show 1 slide
            },
            // min-width: 579px
            576: {
                items: 3 //on devices with width 579px to 768px show show 2 slides
            },
            // min-width: 768px
            768: {
                items: 5 //on devices with width 768px and above show 3 slides 
            }
        }
    }
    );

});

function toggleFavorite(itemId, userId, action) {

    const whiteHeart = '\u2661';
    const blackHeart = '\u2665';

    if (action == "favorite") {

        $("#heart" + itemId).text(blackHeart);
        $("#heart" + itemId).css({
            fontSize: 35
        });
        $("#heart" + itemId).attr("onclick", "toggleFavorite(" + itemId + "," + userId + "," + "'unfavorite')");

        $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            dataType: 'json',
            data: { favorite: 'favorite', itemId: itemId, userId: userId }
        });

    } else if (action == "unfavorite") {

        $("#heart" + itemId).text(whiteHeart);
        $("#heart" + itemId).css({
            fontSize: 35
        });
        $("#heart" + itemId).attr("onclick", "toggleFavorite(" + itemId + "," + userId + "," + "'favorite')");

        $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            dataType: 'json',
            data: { unfavorite: 'unfavorite', itemId: itemId, userId: userId }
        });

    }

}