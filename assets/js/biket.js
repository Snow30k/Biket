$(document).ready(function () {
	$(".container.pegawai #CardPegawai").on("slide.bs.carousel", function (e) {
		var $e = $(e.relatedTarget);
		var idx = $e.index();
		var itemsPerSlide = 3;
		var totalItems = $("#CardPegawai .carousel-item").length;

		if (idx >= totalItems - (itemsPerSlide - 1)) {
			var it = itemsPerSlide - (totalItems - idx);
			for (var i = 0; i < it; i++) {
				// append slides to end
				if (e.direction == "left") {
					$("#CardPegawai .carousel-item")
						.eq(i)
						.appendTo(".carousel-inner.corPegawai");
				} else {
					$("#CardPegawai .carousel-item")
						.eq(0)
						.appendTo($(this).find(".carousel-inner.corPegawai"));
				}
			}
		}
	});
});
