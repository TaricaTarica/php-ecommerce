$( document ).ready(function() {
    $('.slider').slider({interval:100000});
    $('input#input_text, textarea#review-comment').characterCounter();
    $('select').formSelect();
});