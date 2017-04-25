/**
 * Created by alexr on 24/04/2017.
 */
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

    //Button top
    $('#back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
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

function ajoutComment() {
    var email = document.getElementById('email').value;
    var comment = document.getElementById('comment').value;
    var node = document.createElement("DIV"); // Create a <li> node
    var node2 = document.createElement("H4"); // Create a <li> node
    var node3 = document.createElement("P"); // Create a <li> node
    var textnode = document.createTextNode(email); // Create a text node
    var textnode2 = document.createTextNode(comment); // Create a text node
    node2.appendChild(textnode); // Append the text to <li>
    node3.appendChild(textnode2); // Append the text to <li>
    node.appendChild(node2); // Append the text to <li>
    node.appendChild(node3); // Append the text to <li>
    document.getElementById("commentaire").appendChild(node);
}

$("#comm").submit(function (e) {
    e.preventDefault();
    ajoutComment();
})
