/**
 * Created by alexr on 24/04/2017.
 */
$(document).ready(function () {

    $("#comm").submit(function (e) {
        e.preventDefault();
        ajoutComment();
    })

})

function ajoutComment() {
    var name = document.getElementById('name').value;
    var comment = document.getElementById('comment').value;
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var textnode = document.createTextNode(comment); // Create a text node
    var textnode2 = document.createTextNode(name); // Create a text node
    var textnode3 = document.createTextNode(day + '/' + month + '/' + year); // Create a text node
    var node = document.createElement("DIV"); // Create a <li> node
    var node4 = document.createElement("SPAN"); // Create a <li> node
    var node5 = document.createElement("SPAN"); // Create a <li> node
    var node2 = document.createElement("P"); // Create a <li> node
    var node3 = document.createElement("DIV"); // Create a <li> node
    node4.classList.add("author");
    node4.appendChild(textnode2);
    node5.classList.add("date");
    node5.appendChild(textnode3);
    node3.appendChild(node4); // Append the text to <li>
    node3.appendChild(node5); // Append the text to <li>
    node2.classList.add("comment-body")
    node2.appendChild(textnode);
    node3.classList.add("comment-infos");
    node3.appendChild(node4);
    node3.appendChild(node5);
    node.classList.add("comment");
    node.appendChild(node2); // Append the text to <li>
    node.appendChild(node3); // Append the text to <li>
    document.getElementById("comments").appendChild(node);
}
