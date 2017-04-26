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
