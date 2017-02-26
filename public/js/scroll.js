$(document).on("scroll", onScroll);

//Smooth scrolling
$("a[href*=#]:not([href=#])").click(function() {
    if (location.pathname.replace(/^\//,"") == this.pathname.replace(/^\//,"") && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) +"]");
      if (target.length) {
        $("html,body").animate({
          scrollTop: target.offset().top - 80
        }, 1000);
        return false;
      }
    }
});

function onScroll (event) {
	var scrollPos = $(document).scrollTop();

	$("#gallery-categories a").each(function () {
		var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		if(refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
			currLink.addClass("active");
		} else {
			currLink.removeClass("active");
		}
	});
}