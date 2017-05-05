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
        getMaxHeightCol2()
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


    // Ajout de menu
    $('.menu-edit li.add a').click(function (event) {
        addSubMenu($(this), event)
    })
    $('.menu-edit div.add a').click(function (event) {
        event.preventDefault()

        var menuGroup = "<div class='menu-group'>" +
            "<p>" +
            "<span class='modified' contenteditable='true'>New</span>" +
            "<a href='#'>" +
            "<i class='fa fa-trash' aria-hidden='true'></i>" +
            "</a>" +
            "</p>" +
            "<ul class='sub'>" +
            "<li class='add'>" +
            "<a href='#'>" +
            "<i class='fa fa-plus-circle ' aria-hidden='true '></i>" +
            "</a>" +
            "</li>" +
            "</ul>" +
            "</div>" +
            "<div class='hr'></div>";

        $(this)
            .parent()
            .before(menuGroup)

        $(this)
            .parents(".menu-edit")
            .children(".menu-group:last")
            .children("ul")
            .children(".add")
            .children()
            .click(function (event) {
                addSubMenu($(this), event)
            })
    })

    // Content edition
    $('[contenteditable="true"]').each(function () {
        var content = $(this).text()
        $(this).attr('data-content', content)
    })
    $('[contenteditable="true"]').on('keyup keypress blur change', function () {
        var base = $(this).attr('data-content')
        var text = $(this).text()
        if (text != base) {
            $(this).addClass("modified")
        } else {
            $(this).removeClass("modified")
        }
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

function getMaxHeightCol2() {
    var pagerOffset = $('footer').offset().top - 100
    var windowHeight = $(window).height()
    var windowScroll = window.scrollY

    var isAnimating = $('.col2').hasClass('animating')
    var isUnstick = $('.col2').hasClass('unstick')
    if (windowScroll > pagerOffset - windowHeight) {
        if (isUnstick || isAnimating) {
            return
        }
        $('.col2').addClass('animating')
        animateScrollBottom('.col2', function () {
            $('.col2').addClass('unstick')
            $('.col2').removeClass('animating')
        })
    } else {
        if (!isUnstick || isAnimating) {
            return
        }
        $('.col2').addClass('animating')
        $('.col2').removeClass('unstick').animate({
            scrollTop: $(this).height()
        }, 0)
        $('.col2').removeClass('animating')
    }
}

function resizeImg() {
    resizeHot()
    if ($(window).width() > 1200) return
    $('.wrapper-img').each(function () {
        $(this).css('height', $(this).width() / 2)
    })
}

function resizeHot() {
    $('#hot .wrapper-img').each(function () {
        $(this).css('height', $(this).width() / 2)
    })
}
var timeout

function animateScrollTop(selector, callback) {
    $(selector).animate({
        scrollTop: 0
    }, {
        duration: 600,
        done: function () {
            //            clearTimeout(timeout)
            //            timeout = setTimeout(function () {
            callback()
            //            }, 400)
        }
    })
}

function animateScrollBottom(selector, callback) {
    $(selector).animate({
        scrollTop: $(this).height()
    }, {
        duration: 600,
        done: function () {
            //            clearTimeout(timeout)
            //            timeout = setTimeout(function () {
            callback()
            //            }, 400)
        }
    })
}

function addSubMenu(elem, event) {
    event.preventDefault()

    var html = '<p>' +
        '<span class="modified" contenteditable="true">New</span>' +
        '<a href="#">' +
        '<i class="fa fa-trash" aria-hidden="true"></i>' +
        '</a>' +
        '</p>';

    elem
        .parent()
        .before(html)

}
