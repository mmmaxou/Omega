DUPLICATE_ARTICLE = true;

$(document).ready(function () {

	var menuContent, h;
	h = getMenuOffset()
	$(window).resize(function () {
		h = getMenuOffset()
	})
	$(window).scroll(function () {
		getMenuFixed(h)
	})

	if (DUPLICATE_ARTICLE) {
		$container = $('#articles')
		html = $container.html()
		$article = $('#article')
		for (var i = 0; i < 10; i++) {
			$container.append(html)
			$container.children(".article:last-child").attr("id", "article" + i)
		}
		$article.remove('#article')
	}

})

function getMenuOffset() {
	return $('.content .navbar')[0].offsetTop;
}

function getMenuFixed(h) {
	if (window.scrollY > h) {
		$('.content .navbar').addClass('navbar-fixed-top')
		$('body').css('margin-top', $('.content .navbar').height())
	} else {
		$('.content .navbar').removeClass('navbar-fixed-top')
		$('body').css('margin-top', 0)
	}
}
