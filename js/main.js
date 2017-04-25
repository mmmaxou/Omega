DUPLICATE_ARTICLE = true;
DUPLICATE_RESULTS = true;

$(document).ready(function () {

    // Menu fixed
    var menuContent, h;
    h = getMenuOffset()
    getMenuFixed(h)
    $(window).resize(function () {
        h = getMenuOffset()
    })
    $(window).scroll(function () {
        getMenuFixed(h)
    })

    // duplicate the articles
    if (DUPLICATE_ARTICLE) {
        $container = $('#articles')
        html = $container.html()
        $article = $('#article')
        for (var i = 0; i < 10; i++) {
            $container.append(html)
            $container.children(".article:last-child").attr("id", "article" + i)
        }
        $article.remove()
    }

    if (DUPLICATE_RESULTS) {
        $container = $('#results')
        html = $container.html()
        $result = $('#result')
        for (var i = 0; i < 10; i++) {
            $container.append(html)
            $container.children(".result:last-child").attr("id", "result" + i)
        }
        $result.remove()


    }


    //Button top
    $('#back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })


    // Image placement
    $('.wrapper-img').each(function () {
        src = $(this).attr('data-src')
        $(this).css('background-image', 'url(' + src + ')')
    })
    resizeImg()
    $(window).resize(function () {
        resizeImg()
    })


    // Handle Pusher
    resizePusher(h)
    $(window).scroll(function () {
        resizePusher(h)
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

function resizeImg() {
    if ($(window).width() > 1200) return
    $('.wrapper-img').each(function () {
        $(this).css('height', $(this).width() / 2)
    })
}

function resizePusher(h) {
    var p = $('#pusher');
    if ($(window).width() < 998) {
        p.css('height', 0)
        return
    }
    var p = $('#pusher');
    var height = $(window).scrollTop()
    height -= $('.col1')[0].offsetTop
    height += 15
    height += $('.navbar-fixed-top').height()

    var maxHeight = $('.col1').height()
    $('.col2').children().each(function () {
        if ($(this).attr('id') == 'pusher')
            return
        maxHeight -= $(this).height() + 2
    })
    maxHeight -= $('.navbar-fixed-top').height()

    // resize col height
    $('.col2').css("max-height", height + $(window).height() - $('.navbar-fixed-top').height())


    // max size
    if (height > maxHeight) {
        height = maxHeight
        //        $('.col2').css("max-height", height + $(window).height())
    }

    p.css("height", height)

}
