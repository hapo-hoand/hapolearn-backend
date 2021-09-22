const { ajax } = require("jquery");
const { countBy, result } = require("lodash");

$(function () {
  $(".example-popover").popover({
    container: "body",
  });

  $(".autoplay").slick({
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1500,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $(".item-menu").click(function () {
    $(".item-menu").removeClass("item-active");
    $(this).addClass("item-active");
    $(".btn-menu").attr("aria-expanded", "false")
    $(".btn-menu").addClass("collapsed")
    $(".custom-menu").removeClass("show")
  });

  $(".btn-menu").click(function () {
    $(this).toggleClass("rotate");
  });

  $("#login").click(function (e) {
    e.preventDefault();
    $("#modal-login").modal("show");
  });

  $(".close-modal").click(function () {
    $("#modal-login").modal("hide");
  });

  $(".messenger").click(function () {
    $(".wrap-mess").toggleClass("show");
  });

  $(".close-mess").click(function () {
    $(".wrap-mess").toggleClass("show");
  });

  if ($("#login-accout input").hasClass("is-invalid")) {
    $("#modal-login").modal("show");
    $("#login-href").trigger("click");
  }

  if ($("#register-accout input").hasClass("is-invalid")) {
    $("#modal-login").modal("show");
    $("#register-href").trigger("click");
  }

  if ($('#checksignin').hasClass('error')) {
    $("#modal-login").modal("show");
  }

  $('#btnFilter').click(function (e) {
    e.preventDefault();
    $('.list-course').toggleClass('margin-top');
  })

  $("#btnClear").click(function (e) {
    e.preventDefault();
    $(".form-filter option").removeAttr('selected')
      .filter('[value=""]')
      .attr('selected', true)
  })

  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    if ($('#teacher').hasClass('active')) {
      $('.custom-col-course').addClass('border-transparent')
      $('.custom-col-course').removeClass('border-col-course')
    }
    else {
      $('.custom-col-course').addClass('border-col-course')
      $('.custom-col-course').removeClass('border-transparent')
    }
  });

  $('.edit-profile .input-profile').attr('disabled', 'disabled')
  $('.edit-icon').on('click', function () {
    if ($(this).parent('.info-user').find('.input-profile').attr('disabled')) {
      $(this).parent('.info-user').find('.input-profile').removeAttr('disabled', false)
    } else {
      $(this).parent('.info-user').find('.input-profile').attr('disabled', 'disabled')
    }
  })

  $('.progress-bar').each(function (index, value){
    $(this).css('width', $(this).attr('data-width') + '%')
  });

  $('#logout').on('click', function() {
    window.location.href = '/signout'
  })

  $('#reset-pass').on('click', function() {
    window.location.href = '/resetpassword'
  })
  status();
  loadstarcolor();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $value = $(this).val();
  $id = $('#courseId').val();
  loadlesson($value, $id);
  loadreviews($id);

  $('#btnSearchLesson').on('click',function(){
    $value = $('#nameLesson').val();
    $id = $('#courseId').val();
    loadlesson($value, $id);
  })

 
  $('#takecourse').on('click', function(e) {
    e.preventDefault();
    var id = $('#courseId').val()
    var cost = $('.price .info-data').attr('data-value');
    if (cost == 0) {
      $price = '';
      window.location.href = "/takethiscourse/" + id
    }
    else {
      $price = cost + '$';
      new swal({
        title: 'Are you sure?',
        text: "This course costs " + $price,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result['isConfirmed']){
          window.location.href = "/takethiscourse/" + id
        }
      })
    }
  })

  $("#btnComment").on('click', function(e) {
    e.preventDefault();
    $id = $('#courseId').val();
    loadreviews($id)
   
  })

  $('#send').on('click', function(e) {
    e.preventDefault();
    var content = $('#content').val();
    var vote = $("input[name='vote']:checked").val();
    let parent_id = 0;
    if (content || vote) {
      if (vote === undefined) {
        vote = 0
      }
      $.ajax({
        type: 'POST',
        url: "/storereview",
        data: {
          'id': $id,
          'parent_id': parent_id,
          'content': content,
          'vote': vote
        },
        dataType: 'json',
        success:function(data) {
          console.log("Review::"+data)
          if (data == true) {
            loadreviews($id);
          }
          $('#content').val("");
          $("input[name='vote']").prop('checked', false);
        }
      })
    }
  })

  $('.update-status').on('click', function(e) {
    var id = $(this).attr('data-id');
    $.ajax({
      type: "post",
      url: "/storeDocument",
      data: {'id': id},
      dataType: "json",
      success: function (response) {
        console.log(response)
        if (response == true) {
          status();
        }
      }
    });
  })
});


$("#photo").on('change', function () {
  console.log($(this).val())
  var countFiles = $(this)[0].files.length;

  var imgPath = $(this)[0].value;
  var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
  var image_holder = $("#image");
  image_holder.empty();

  if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
      if (typeof (FileReader) != "undefined") {
        $('#modalupload').modal('show')
          for (var i = 0; i < countFiles; i++) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $("<img />", {
                      "src": e.target.result,
                          "class": "thumb-image"
                  }).appendTo(image_holder);
              }
              image_holder.show();
              reader.readAsDataURL($(this)[0].files[i]);
          }
      } else {
          alert("This browser does not support FileReader.");
      }
  } else {
      alert("Pls select only images");
  }
});

$('#modalupload').on('hidden.bs.modal', function () {
  $("#photo").val('');
});

$('#btn-update-avt').on('click', function() {
  var file = $('#photo').prop('files')[0];
  console.log(file);
  var form_data = new FormData();
  form_data.append('file', file);
  $.ajax({
    type: "post",
    url: "/updateimg",
    data: form_data,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (response) {
      console.log(response);
      if (response == true) {
        $('#modalupload').modal('hide');
        swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Your work has been saved',
          showConfirmButton: false,
          timer: 1500
        }).then((result) => {
        location.reload();
        })
      }
    }
  });
})

function loadreviews($id) {
  $.ajax({
    type: 'POST',
    url: "/getreviews",
    data: {
      'id': $id
    },
    dataType: 'json',
    success:function(data) {
      console.log("DATA::: ", data);
      let html = '';

      data.reviews.forEach(reviews => {
          html += generateReviews(reviews, data.reviews)
      })
      console.log('REply::'+html)
      $('#listReviews').html(html);
      $('#numberReview').html(data.number_review + ' Reviews')
      if (data.totalrating == null)
      { 
        data.totalrating = 0;
      }
      if (data.avg_rate == null)
      { 
        data.avg_rate = 0;
      }
      $('#number-vote').html(data.totalrating + ' rating')
      $('#number-rate').html(parseFloat(data.avg_rate).toFixed(1));
      loadstarcolor();
      $('.delete-comment').on('click', function(e) {
        e.preventDefault();
       let id = $(this).closest('.reviews').attr('data-id');
       $.ajax({
         type: "post",
         url: "/destroy",
         data: {id: id},
         dataType: "json",
         success: function (response) {
          loadreviews($id)
         }
       });
      })
      
      $('.edit-comment').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.reviews').find('.tool').css('display', 'none')
        let data =  $(this).closest('.reviews').find('.content').text()
        $(this).closest('.reviews').find('.content-describe-course').html('')
        $(this).closest('.reviews').find('.content-describe-course').append('<div class="edit-content"><textarea class="form-control content" name="" id="" class="w-100" rows="2"></textarea><span class="reply edit-comment-tool save-tool btn-danger"><i class="fas fa-save"></i> Save</span><span class="reply edit-comment-tool cancel-tool btn-dark">Cancle</span></div>')
        $(this).closest('.reviews').find('.content-describe-course textarea').val(data)
      });
    }
  })
}

$(document).on("click", ".cancel-tool" , function(e) {
  e.preventDefault();
  loadreviews($id)
});

$(document).on("click", ".save-tool" , function(e) {
  e.preventDefault();
  let id = $(this).closest('.reviews').attr('data-id')
  let content = $(this).closest('.reviews').find('.content-describe-course .content').val()
  if (content != '') {
    $.ajax({
      type: 'POST',
      url: "/updatereview",
      data: {
        'id': id,
        'content': content,
      },
      dataType: 'json',
      success:function(data) {
        console.log("Review::"+data)
        if (data == true) {
          loadreviews($id);
        }
      }
    })
  }
});

$(document).on("click", ".save-reply-tool" , function(e) {
  e.preventDefault();
  let parent_id = $(this).closest('.reviews').attr('data-id')
  let content = $(this).closest('.reviews').find('.collapse textarea').val()
  if (content != '') {
    $.ajax({
      type: 'POST',
      url: "/storereview",
      data: {
        'id': $id,
        'parent_id': parent_id,
        'content': content,
      },
      dataType: 'json',
      success:function(data) {
        console.log("Review::"+data)
        if (data == true) {
          loadreviews($id);
        }
      }
    })
  }
});

function loadlesson($value, $id) {
  $.ajax({
    type: 'POST',
    url: "/searchlesson",
    data: {
      'name': $value,
      'id': $id
    },
    dataType: 'json',
    context: this,
    success:function(data) {
      console.log("DATA::lesson", data);
      let html = '';
      let i = 1;
      data.lessons.forEach(lesson => {
        html += generateLessonHtml(lesson, i, data.id);
        console.log(html);
        i++;
      });
      $('#list-lessons').html(html);
      loadstarcolor();
     
      var checktakein = $('#list-lessons').attr('data-check');
      console.log(checktakein);
       if (checktakein == 0) {
        $('.list-lessons .item-lesson .link-lesson').css('display', 'none');
      }
      else { 
        $('.list-lessons .item-lesson .link-lesson').css('display', 'flex');
      }
    }
  });
}

function generateLessonHtml(lessonData, i, course_id) {
  let html = '';
  html += '<div class="item-lesson">'
  html += '<div class="number text-center">';
  html += i;
  html += '</div>';
  html += '<div class="desc-lesson">'
  html += '<a href="#">' + lessonData.title +  '</a>';
  html += '</div>'
  html += '<div class="link-lesson col-lesson">';
  html += '<a href="/home/course/' + course_id + '/lesson/' + lessonData.id + '" class="btn link-course">Learn</a>'
  html += '</div>'
  html += '</div>'
  return html;
}

function generateReviews(reviewData, arrayData) {
  var n = reviewData.pivot.rate;
  let html = '';
  if (reviewData.pivot.parent_id == 0) {
  html += '<div class="mentor reviews" data-id = ' + reviewData.pivot.id + '>'
  html += '<div class="info">';
  html += '<div class="avt">'
  html += '<img src="http://127.0.0.1:8000/images/' + reviewData.avatar + '" alt="">';
  html += '</div>'
  html += '<div class="detail d-block d-lg-flex w-100">';
  html += '<span class="name custom-font-bold">' + reviewData.name + '</span>'
  html += '<div class="star" data-rate="' + reviewData.pivot.rate + '">';
  for (var i = 0; i < n; i++) {
    html += '<span><i class="fas fa-star"></i></span>';
  }
  html += '</div>'
  html += '<div class="time">' + new Date(reviewData.pivot.time).toDateString() + '</div>'
  html += '</div>'
  html += '</div>'
  html += '<div class="content-describe-course describe-mentor">'
  if (reviewData.pivot.content == null) {
    reviewData.pivot.content = '';
  }
  html += '<div class="form-group">'
  html += '<p class="content">' + reviewData.pivot.content + '</p>'
  html += '</div>'
  html += '</div>'
  html += '<div class="form-group tool">'
  html += '<a class="reply mx-2" data-toggle="collapse" href="#reply' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">Reply</a>'
  if ($('#loginId').val() == reviewData.pivot.user_id) {
    html += '<a class="reply mx-2 edit-comment" href="#edit' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">edit</a>'
    html += '<a class="reply mx-2 delete-comment" href="#delete' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">delete</a>'  
  }
  html += '</div>'
  html += '<div class="collapse" id="reply' + reviewData.pivot.id + '">'
  html += '<div class="form-group">'
  html += '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>'
  html += '<span class="reply edit-comment-tool save-reply-tool btn-danger"><i class="fas fa-save"></i> Save</span>'
  html += '</div>'
  html += '</div>'
  html += '</div>'
  html += generateReplies(arrayData, reviewData.pivot.id)
  html += '</div>'
  }
  return html;
}

function loadstarcolor () {
  $(".star" ).each(function() {
    var n = $(this).attr('data-rate');
    for(var i = 0; i < n; i++) {
      $(this).find('span').eq(i).css('color', '#FFD567')
    }
  });
}

function generateReplies(data, parent_id, marginleft = 0)
{
  let html='';
  marginleft = marginleft + 48;
  data.forEach(item => {
    if (parent_id == item.pivot.parent_id) {
      html += replies(item, marginleft)
      html += generateReplies(data, item.pivot.id, marginleft)
    }
  });
  return html;
}

function replies(reviewData, marginleft)
{
  var n = reviewData.pivot.rate;
  let html = '';
  html += '<div class="mentor reviews" style="margin-left:'+ marginleft +'px;" data-id = ' + reviewData.pivot.id + '>'
  html += '<div class="info">';
  html += '<div class="avt">'
  html += '<img src="http://127.0.0.1:8000/images/' + reviewData.avatar + '" alt="">';
  html += '</div>'
  html += '<div class="detail d-block d-lg-flex w-100">';
  html += '<span class="name custom-font-bold">' + reviewData.name + '</span>'
  html += '<div class="star" data-rate="' + reviewData.pivot.rate + '">';
  for (var i = 0; i < n; i++) {
    html += '<span><i class="fas fa-star"></i></span>';
  }
  html += '</div>'
  html += '<div class="time">' + new Date(reviewData.pivot.time).toDateString() + '</div>'
  html += '</div>'
  html += '</div>'
  html += '<div class="content-describe-course describe-mentor">'
  if (reviewData.pivot.content == null) {
    reviewData.pivot.content = '';
  }
  html += '<div class="form-group">'
  html += '<p class="content">' + reviewData.pivot.content + '</p>'
  html += '</div>'
  html += '</div>'
  html += '<a class="reply mx-2" data-toggle="collapse" href="#reply' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">Reply</a>'
  if ($('#loginId').val() == reviewData.pivot.user_id) {
    html += '<a class="reply mx-2 edit-comment" href="#edit' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">edit</a>'
    html += '<a class="reply mx-2 delete-comment" href="#delete' + reviewData.pivot.id + '" role="button" value="' + reviewData.pivot.id + '" aria-expanded="false">delete</a>'  
  }
  html += '<div class="collapse" id="reply' + reviewData.pivot.id + '">'
  html += '<div class="form-group">'
  html += '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>'
  html += '<span class="reply edit-comment-tool save-reply-tool btn-danger"><i class="fas fa-save"></i> Save</span>'
  html += '</div>'
  html += '</div>'
  html += '</div>'
  html += '</div>'
  return html;
}

function status() {
  var lessonID = $('#lessonID').val()
  $.ajax({
    type: "get",
    url: "/statusDocument",
    data: {'lessonID': lessonID},
    dataType: "json",
    success: function (response) {
      console.log(response)
      response.documents.forEach( document => {
        $('.item-documents').each( function (index) {
          var data_id = $(this).find('.link-lesson a').attr('data-id');
          if (document.id == data_id) {
            $(this).find('.link-lesson .status-docx').html('<i class="far fa-check-circle mx-2">');
          }
        })
      })
    }
  });
}
