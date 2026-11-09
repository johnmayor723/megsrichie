(function ($) {
	"use strict";

	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});

	if ($("input.product-count").length) {
        $("input.product-count").TouchSpin({
            min: 1,
            max: 1000,
            step: 1,
            buttondown_class: "btn btn-link",
            buttonup_class: "btn btn-link",
        });
    }  

})(jQuery);