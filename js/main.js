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
    // PETIT
    $('.menu-edit li.add a').click(function (event) {
        addSubMenu($(this), event)
    })
    // GROS
    $('.menu-edit div.add a').click(function (event) {
        event.preventDefault()

        var menuGroup = "<div class='menu-group'>" +
            "<p>" +
            "<span class='added' contenteditable='true'>New</span>" +
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
            .parent()
            .siblings(".menu-group:last")
            .children("p")
            .children("a")
            .click(function (event) {
                deleteBigMenu($(this), event)
            })

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

    // Suppression de menu
    // PETIT
    $('.menu-edit .sub p a').click(function (event) {
        deleteSubMenu($(this), event)
    })

    // Suppression de menu
    // GROS
    $('.menu-group > p a').click(function (event) {
        deleteBigMenu($(this), event)
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

    /*
    http://stackoverflow.com/questions/5035547/pass-javascript-array-php
    */

    //Gather the datas

    $('#menu-main .save').click(function () {
        //console.log($(this))
        var edit = $(this).parent().prev()
        //console.log(edit)
        var added = []
        var modified = []
        var deleted = []

        edit.children(".menu-group").each(function () {
            // TODO
            var display = true
            var parent_menu_id = null
            var page_id = null
            var create_user_id = null
            var updated_user_id = null
            var gallery_id = null

            var main = $(this)
                .children("p")
                .children("span")
            var name = main.text()
            var id = null


            if (main.hasClass("modified")) {
                // Find the id
                // Push it
                var partial = {
                    id: id,
                    name: name,
                }
                modified.push(partial)
            }
            if (main.hasClass("deleted")) {
                // Find the id
                // Push it
                var partial = {
                    id: id,
                }
                deleted.push(partial)
            }
            if (main.hasClass("added")) {
                //Create datas
                var partial = {
                    id: id,
                    name: name,
                    display: display,
                    parent_menu_id: parent_menu_id,
                    page_id: page_id,
                    create_user_id: create_user_id,
                    updated_user_id: updated_user_id,
                    gallery_id: gallery_id,
                }

                added.push(partial)
            }

            $(this)
                .children(".sub")
                .children("p")
                .each(function () {
                    //                    console.log($(this))

                    // TODO
                    var display = true
                    var parent_menu_id = null
                    var page_id = null
                    var create_user_id = null
                    var updated_user_id = null
                    var gallery_id = null

                    var main = $(this)
                        .children("span")
                    var name = main.text()
                    var id = null

                    if (main.hasClass("modified")) {
                        // Find the id
                        // Push it
                        var partial = {
                            id: id,
                            name: name,
                        }
                        modified.push(partial)
                    }
                    if (main.hasClass("deleted")) {
                        // Find the id
                        // Push it
                        var partial = {
                            id: id,
                        }
                        deleted.push(partial)
                    }
                    if (main.hasClass("added")) {
                        //Create datas
                        var partial = {
                            id: id,
                            name: name,
                            display: display,
                            parent_menu_id: parent_menu_id,
                            page_id: page_id,
                            create_user_id: create_user_id,
                            updated_user_id: updated_user_id,
                            gallery_id: gallery_id,
                        }

                        added.push(partial)
                    }

                })

        })


        var data = {
            added: added,
            modified: modified,
            deleted: deleted,
        }

        $(this)
            .siblings("input")
            .val(JSON.stringify(data))

                $(this).parent().submit()

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
        '<span class="added" contenteditable="true">New</span>' +
        '<a href="#">' +
        '<i class="fa fa-trash" aria-hidden="true"></i>' +
        '</a>' +
        '</p>';

    elem.parent()
        .before(html)

    elem.parent()
        .prev()
        .children("a")
        .click(function (event) {
            deleteSubMenu($(this), event)
        })


}

function deleteBigMenu(elem, event) {
    event.preventDefault()

    if (elem.children().hasClass("fa-trash")) {
        elem.children()
            .removeClass("fa-trash")
            .addClass("fa-undo")
            .parent()
            .prev()
            .removeClass("modified")
            .addClass("deleted")
            .attr("contenteditable", "false")
            .parent()
            .siblings(".sub")
            .children(".add")
            .fadeOut()
            .siblings("p")
            .each(function () {
                $(this)
                    .children("a")
                    .click()
                    .hide()
            })
    } else {
        elem.children()
            .addClass("fa-trash")
            .removeClass("fa-undo")
            .parent()
            .prev()
            .removeClass("deleted")
            .attr("contenteditable", "true")
            .blur()
            .parent()
            .siblings(".sub")
            .children(".add")
            .fadeIn()
            .siblings("p")
            .each(function () {
                $(this)
                    .children("a")
                    .show()
                    .click()
            })

    }
}

function deleteSubMenu(elem, event) {
    event.preventDefault()
    if (elem.children().hasClass("fa-trash")) {
        elem.children()
            .removeClass("fa-trash")
            .addClass("fa-undo")
            .parent()
            .prev()
            .removeClass("modified")
            .addClass("deleted")
            .attr("contenteditable", "false")
    } else if (!elem
        .parents(".sub")
        .prev()
        .children("span")
        .hasClass("deleted")
    ) {
        elem.children()
            .removeClass("fa-undo")
            .addClass("fa-trash")
            .parent()
            .prev()
            .removeClass("deleted")
            .attr("contenteditable", "true")
            .blur()
    }
}
