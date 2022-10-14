
$(function () {
    /*=======================
                UI Slider Range JS
    =========================*/
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 5000000,
        values: [1000, 50000000],
        slide: function (event, ui) {
            $("#amount").val("Rp" + ui.values[0] + " - Rp" + ui.values[1]);
        }
    });
    $("#amount").val("Rp" + $("#slider-range").slider("values", 0) +
        " - Rp" + $("#slider-range").slider("values", 1));
});
