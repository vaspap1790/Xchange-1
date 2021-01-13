
$(document).ready(function () { //when document is ready

    $('#sidebarCollapse').on('click', function () {
        if ($('#sidebar').hasClass('active')) {
            $('#content').removeClass('offset-1');
        } else {
            $('#content').addClass('offset-1');
        }
        $('#sidebar').toggleClass('active');
    });

});
