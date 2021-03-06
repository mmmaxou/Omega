DUPLICATE_ARTICLE = false;
DUPLICATE_RESULTS = false;
var Editor;
var ORIGIN = window.location.origin + "/Omega"

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function load() {

  load_layout()

  load_general()

  load_article()

}
$(document).ready(load)



function load_general() {

  // Image placement
  $('.wrapper-img').each(function () {
    src = $(this).attr('data-src')
    if (src == "../../uploads/") {
      src = "../../uploads/default.jpeg"
    }
    $(this).css('background-image', 'url(' + src + ')')
  })
  resizeImg()

  // Change the partial    
  $('a[href]').click(function (e) {
    e.preventDefault()
    // console.log($(this))
    var href = $(this).attr("href")
    // There is no internal link
    if (!href || href == "" || href == "#") {
      return
    }


    // remove the index
    href = href.replace("Index.php", "").replace("?", "")
    // Index redirection without module
    if (href == "") {
      var data = "module=index&partial=1"
    } else {
      var data = href + "&partial=1"
    }
    console.log(data)

    // Change the url
    var href_get = "?" + href // Useful for my function get
    var module = $_GET("module", href_get)
    var new_url;
    if (module == "article") {
      new_url = "/article/" + $_GET("id", href_get)
    } else if (module == "research") {
      new_url = "/research/" + $_GET("query", href_get)
    } else if (module == "index" || href == "") {
      new_url = "/"
    } else {
      return
    }
    new_url = "/Omega" + new_url

    console.log(new_url)


    $.ajax({
      url: ORIGIN + '/php/Controllers/Index.php',
      type: 'GET',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        console.log(res)
        console.log(statut)
        $("#partial").empty().append(res);
        window.history.pushState({
          "html": res,
          "pageTitle": "Omega"
        }, "", new_url)

        load_general()
        load_article()

      },
    })

  })

  // Slide the categories
  $('.my-slider').each(function () {
    if ($(this).attr('data-enabled')) {
      return
    }
    var slider = $(this)
    //Enable only once
    $(this).attr('data-enabled', "true")

    // Gather the array
    var tags = $(this).text()
    tags = $.trim(tags)
    tags = tags.split(",")
    console.log(tags)

    // Empty the slider
    $(this).empty()

    // Fill with the new elements twice
    tags.forEach(function (elt) {
      slider.append('<div>#' + elt + '</div>')
    })
    tags.forEach(function (elt) {
      slider.append('<div>#' + elt + '</div>')
    })
    tags.forEach(function (elt) {
      slider.append('<div>#' + elt + '</div>')
    })

    $(this).slick({
      infinite: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 0,
      arrows: false,
      cssEase: "linear",
      speed: 3000,
      centerMode: true,
      slidesToShow: 1,
      touchMove: false,
      swipe: false,
      draggable: false,
      waitForAnimate: false,
      slidesToScroll: 1,
      variableWidth: true,
    });

  })

}

function load_layout() {
  /* ########################## */
  /* ######### LAYOUT ######### */
  /* ########################## */

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

  $(window).resize(function () {
    resizeImg()
  })


  //Button top
  $('#back-to-top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 1000);
  })


  // Connexion
  $('#connexion-dropdown .nav li').click(function (e) {
    e.preventDefault()
    var toggle = $(this).attr('data-toggle')

    // OPPOSITE FOR USER INTERFACE
    $(this)
      .removeClass('active')
      .siblings()
      .addClass('active')
    $('#' + toggle)
      .addClass('active')
      .siblings('form')
      .removeClass('active')
  })

  /* ######################## */
  /* ######### AJAX ######### */
  /* ######################## */

  // Connection
  $('#connect').submit(function (e) {
    e.preventDefault()
    var data = $(this).serialize()
    $.ajax({
      url: ORIGIN + '/php/Controllers/Login.php',
      type: 'POST',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        res = JSON.parse(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }
        if (res.success) {
          // We are now connected
          console.log(res)
          connect(res)
        }
      },
    })

  })
  $('#disconnect').click(function (e) {
    e.preventDefault()
    var data = null;
    $.ajax({
      url: ORIGIN + '/php/Controllers/Disconnect.php',
      type: 'POST',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        res = JSON.parse(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }
        if (res.success) {
          disconnect()
        }
      },
    })

  })
  $('#subscribe').submit(function (e) {
    e.preventDefault()
    var data = $(this).serialize()
    $.ajax({
      url: ORIGIN + '/php/Controllers/Subscribe.php',
      type: 'POST',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        res = JSON.parse(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }
        if (res.success) {
          connect(res.username)
        }
      },
    })

  })
  $('#change > form').submit(function (e) {
    e.preventDefault()
    var data = $(this).serialize()
    $.ajax({
      url: ORIGIN + '/php/Controllers/Change.php',
      type: 'POST',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        res = JSON.parse(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }

        if (res.success) {
          $('#change').prev().click()
        }
      },
    })

  })

  function connect(res) {
    if (res.superUser) {
      $(".connected").fadeIn()
      $(".superUser").fadeIn()
    } else {
      $(".connected:not(.superUser)").fadeIn()
    }
    $(".disconnected").hide()
    $("#username").text(res.username)
  }

  function disconnect() {
    $(".connected").hide()
    $(".disconnected").fadeIn()
  }


  /* ######### REWRITE FORM ######### */
  $('#research-bar').submit(function (e) {
    e.preventDefault()
    var query = $('#query').val()
    var href = $(this).serialize()
    var data = href + "&partial=1"
    console.log(data)

    $.ajax({
      url: ORIGIN + '/php/Controllers/Index.php',
      type: 'GET',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        console.log(res)
        $("#partial").empty().append(res);
        window.history.pushState({
          "html": res,
          "pageTitle": "Omega"
        }, "", "/research/" + query)

        load_general()
        load_article()
      },
    })


  })







  /* ######### EDIT MENU ######### */

  // Add Menu
  // Little
  $('.menu-edit li.add a').click(function (event) {
    addSubMenu($(this), event)
  })
  // Big
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

  // Menu Deletion
  // Little
  $('.menu-edit .sub p a').click(function (event) {
    deleteSubMenu($(this), event)
  })

  // Menu Deletion
  // Big
  $('.menu-group > p a').click(function (event) {
    deleteBigMenu($(this), event)
  })


  contenteditableActivation()

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
      //            var display = true
      var parent_menu_id = null
      //            var page_id = null
      var create_user_id = 1
      var updated_user_id = 1
      //            var gallery_id = null

      var main = $(this)
        .children("p")
        .children("span")
      var name = main.text()
      var id = main.parent()
        .attr('data-id')


      if (main.hasClass("modified")) {
        // Find the id
        // Push it
        var partial = {
          id: id,
          name: name,
          updated_user_id: updated_user_id,
        }
        modified.push(partial)
      }
      if (main.hasClass("deleted")) {
        // Find the id
        // Push it
        if (id) {
          var partial = {
            id: id,
          }
          deleted.push(partial)
        }
      }
      if (main.hasClass("added")) {
        //Create datas
        var partial = {
          name: name,
          //                    display: display,
          parent_menu_id: parent_menu_id,
          //                    page_id: page_id,
          create_user_id: create_user_id,
          //                    updated_user_id: updated_user_id,
          //                    gallery_id: gallery_id,
        }

        added.push(partial)
      }

      $(this)
        .children(".sub")
        .children("p")
        .each(function () {

          var main = $(this)
            .children("span")

          // TODO
          var display = true
          var parent_menu_id = main.parent()
            .parent()
            .prev()
            .attr('data-id')
          //                    var page_id = null
          var create_user_id = 1
          var updated_user_id = 1
          //                    var gallery_id = null

          var name = main.text()
          var id = main.parent().attr('data-id')

          if (main.hasClass("modified")) {
            // Find the id
            // Push it
            var partial = {
              id: id,
              name: name,
              updated_user_id: updated_user_id,
            }
            modified.push(partial)
          }
          if (main.hasClass("deleted")) {
            // Find the id
            // Push it
            if (id) {
              var partial = {
                id: id,
              }
              deleted.push(partial)
            }
          }
          if (main.hasClass("added")) {
            //Create datas
            var partial = {
              name: name,
              //                            display: display,
              parent_menu_id: parent_menu_id,
              //                            page_id: page_id,
              create_user_id: create_user_id,
              //                            updated_user_id: updated_user_id,
              //                            gallery_id: gallery_id,
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

}

function load_article() {
  /* ######### EDIT ARTICLE ######### */

  $('#edit-article').click(function (e) {
    e.preventDefault()

    //title edition
    $("#article-title > span:first-child")
      .attr("contenteditable", "true")
      .parent()
      .addClass("editable")
    $(this).fadeOut()


    // Content Edition


    var text = $("#text-article").html()
    $("#text-article")
      .wrap('<textarea id="textarea">')
    $('textarea').html(text)

    var css = ""
    css += '../../bootstrap/css/bootstrap.css'
    css += ',../../css/component.css'
    css += ',../../css/layout.css'
    css += ',../../css/page.css'
    css += ',../../css/reset.css'
    css += ',../../css/theme.css'
    css += ',../../css/utils.css'
    css += ',../../css/value.css'
    css += ',../../css/mce.css'

    tinymce.init({
      selector: '#textarea',
      plugins: 'code autoresize link',
      menubar: false,
      toolbar: 'undo redo | styleselect bold italic link | alignleft aligncenter alignright bullist numlist outdent indent | code',
      body_id: 'mce',
      autoresize_overflow_padding: 25,
      content_css: css,
    });

    // Form appear


    // Confirmation

    $('.article-bottom.changes').fadeIn()
    $('.article-bottom#keywords').fadeIn()
    $('.article-bottom#description').fadeIn()
    $('.slick-slide .delete').fadeIn()
    $('#uploader').fadeIn()

    $(".textarea-form").each(function (e) {
      $(this).val($(this).attr("data-content"))
    })


    $('#send-file').fadeIn()
    contenteditableActivation()
  })

  $('.btn-close').click(function (e) {
    e.preventDefault()
    location.reload()
  })

  $('.changes .save').click(function (e) {
    e.preventDefault()

    var title = $('#article-title > span:first-child').text().replace(/\n/g, '')
    title = title != "" ? title : undefined;

    var content = tinymce.editors[0].getContent()

    var keywords = $('#keywords textarea').val()
    var description = $('#description textarea').val()

    var added_images = $('#uploader').attr("data-upload")
    if (added_images) {
      added_images = added_images.slice(0, -1).split(",")
    }

    var deleted_images = [];
    $('.slick-slide .deleted').each(function () {
      var id = $(this).attr('data-id');
      var id_exist = deleted_images.some(function (elt) {
        return elt == id
      })
      if (!id_exist) {
        deleted_images.push(id)
      }
    })

    var data = {
      title: title,
      content: content,
      keywords: keywords,
      description: description,
      added_images: added_images,
      deleted_images: deleted_images,
    }
    $("#data_article").val(JSON.stringify(data))
    console.log($('#data').val())

    $('#form-article').submit()
  })

  function delete_image(e) {
    var id = $(this).prev().attr("data-id")

    $(this).parent().parent().children().each(function () {
      if ($(this).children("img").attr("data-id") == id) {
        $(this)
          .children("img")
          .toggleClass('deleted')
          .next()
          .children()
          .toggleClass("fa-trash")
          .toggleClass("fa-undo")
      }
    })
  }
  $('.delete').click(delete_image)

  /* ######### SEND COMMENT ######### */

  $('#comm').submit(function (e) {
    e.preventDefault()

    var page_id = $('#article').attr('data-id')
    var data = $(this).serialize() + "&id=" + page_id;
    if (!$('#articleContent').val()) {
      toastr["error"]("Your comment is empty");
      return
    }

    $.ajax({
      url: ORIGIN + '/php/Controllers/Comment.php',
      type: 'POST',
      data: data,
      dataType: 'text',
      success: function (res, statut) {
        console.log(res)
        res = JSON.parse(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }
        if (res.success) {
          console.log(res.comment)

          $('#emptyComment').remove()

          var html = "<div class='comment' data-id=" + res.comment.id + ">"
          html += "<p class='comment-body'>"
          html += res.comment.content
          html += "</p>"
          html += "<div class='comment-infos'>"
          html += "<span class='author'>" + res.comment.user + "</span>"
          html += "<span class='date'>" + res.comment.date + "</span>"
          html += "<a class='pull-right comment-delete' href=''>"
          html += "delete <i class='fa fa-trash' aria-hidden='true'></i>"
          html += "</a>"
          html += "</div>"
          html += "</div>"

          $('#comments').append(html);
          $('#articleContent').val("")
          $('.comment-delete').click(deleteComment)

        }
      },
    })

    console.log(data)
  })

  function deleteComment(e) {
    e.preventDefault()
    var comment = $(this).parent().parent()
    var id = comment.attr("data-id")
    $.ajax({
      url: ORIGIN + '/php/Controllers/DeleteComment.php',
      type: 'POST',
      data: "id=" + id,
      dataType: 'text',
      success: function (res, statut) {
        console.log(res)
        res = JSON.parse(res)
        console.log(res)
        if (res.toastr) {
          showToastr(res.toastr)
        }
        if (res.success) {
          comment.remove()
          if ($('#comments').children().length == 0) {
            $('#comments').append('<div id="emptyComment">No Comments added yet.</div>')
          }
        }
      },
    })



  }

  $('.comment-delete').click(deleteComment)


  /* ############ SLICK ############ */
  $('.slick-test').slick({
    infinite: true,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 3000,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
    }
  ]
  });

  /* ############ FINE-UPLOADER ############ */

  var uploader = new qq.FineUploader({
    element: document.getElementById('uploader'),
    debug: true,
    autoUpload: false,
    request: {
      endpoint: "/php/Controllers/Endpoint.php"
    },
    deleteFile: {
      enabled: true,
      endpoint: "/php/Controllers/Endpoint.php"
    },
    chunking: {
      enabled: false,
    },
    resume: {
      enabled: true
    },
    retry: {
      enableAuto: false,
      showButton: true
    },
    callbacks: {
      onError: function (id, name, errorReason, xhr) {
        console.log("Error")
        console.log(errorReason)
        console.log(xhr)
      },
      onComplete: function (id, name, responseJSON, xhr) {
        //console.log("success")
        //console.log(name)
        console.log(responseJSON)
        //                console.log(xhr)

        if (!responseJSON.success) {
          console.log("Error, don't append the files")
          return
        }



        var path = "" + responseJSON.uuid + "/" + responseJSON.uploadName + ","
        //console.log(path)
        var a = $('#uploader').attr("data-upload")
        if (a == undefined) {
          a = ""
        }
        //console.log(a)
        $('#uploader').attr("data-upload", a + path)


        // Append to the slicker
        var html = '<div>'
        html += '<img src="../../uploads/' + path.slice(0, -1) + '" alt="image">'
        html += '</div>'

        $('.slick-test').slick('slickAdd', html)
      },

    },
    thumbnails: {
      placeholders: {
        waitingPath: '../../lib/fine-uploader/placeholders/waiting-generic.png',
        notAvailablePath: '../../lib/fine-uploader/placeholders/not_available-generic.png'
      }
    },
  })

  qq(document.getElementById("trigger-upload")).attach("click", function () {
    uploader.uploadStoredFiles();
  });
}

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
    //        animateScrollBottom('.col2', function () {
    //            $('.col2').addClass('unstick')
    //            $('.col2').removeClass('animating')
    //        })
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
// Content edition

function contenteditableActivation() {

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

}

function showToastr(options) {
  toastr[options.type](options.message);
}

function $_GET(param, string) {
  var vars = {};

  if (!string) {
    window.location.href.replace(location.hash, '').replace(
      /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
      function (m, key, value) { // callback
        vars[key] = value !== undefined ? value : '';
      }
    );
  } else {
    string.replace(
      /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
      function (m, key, value) { // callback
        vars[key] = value !== undefined ? value : '';
      }
    );
  }

  if (param) {
    return vars[param] ? vars[param] : null;
  }
  return vars;
}
