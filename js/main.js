DUPLICATE_ARTICLE = true;

$(document).ready(function () {

	var menuContent, h;
	h = getMenuOffset()
	getMenuFixed(h)
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

	$('#back-to-top').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	})

})

function getMenuOffset() {
	return $('.content .navbar')[0].offsetTop;
}

function getMenuFixed(h) {
	if (window.scrollY > h) {
		$('.content .navbar').addClass('navbar-fixed-top')
		$('#back-to-top').fadeIn()
		$('body').css('margin-top', $('.content .navbar').height())
	} else {
		$('.content .navbar').removeClass('navbar-fixed-top')
		$('#back-to-top').hide()
		$('body').css('margin-top', 0)
	}
}
