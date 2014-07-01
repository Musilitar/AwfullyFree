$(document).ready(function() {
    $(".index").click(function(event) {
        $target = event.target;
        $(location).attr('href', $($target).val());
    });

    $("#header a").hover(
        function() {
            $(this).css('background-color', '#FFF');
            $(this).css('color', '#000');
        }, function() {
            if($(this).hasClass('current')) {
                $(this).css('background-color', '#FFF');
                $(this).css('color', '#000');
            }
            else {
                $(this).css('background-color', '#0078E7');
                $(this).css('color', '#FFF');
            }
        }
    );

    $("#addProduct").on('click', '#addButton', function() {
        $("#addProduct").load('productForm.php .pure-form');
    });

    $("#addProduct").on('click', '#cancelButton', function() {
        $("#addProduct").load('productForm.php #addButton');
    });
});
