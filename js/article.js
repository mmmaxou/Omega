/**
 * Created by alexr on 24/04/2017.
 */
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


function ajoutComment() {
    var email = document.getElementById('email').value;
    var comment = document.getElementById('comment').value;
    var node = document.createElement("DIV");// Create a <li> node
    var node2 = document.createElement("H4");// Create a <li> node
    var node3 = document.createElement("P");// Create a <li> node
    var textnode = document.createTextNode(email);         // Create a text node
    var textnode2 = document.createTextNode(comment);         // Create a text node
    node2.appendChild(textnode);                              // Append the text to <li>
    node3.appendChild(textnode2);                              // Append the text to <li>
    node.appendChild(node2);                              // Append the text to <li>
    node.appendChild(node3);                              // Append the text to <li>
    document.getElementById("commentaire").appendChild(node);
}

$("#comm").submit(function(e){
    e.preventDefault();
    ajoutComment();
    alert("pute")
})
