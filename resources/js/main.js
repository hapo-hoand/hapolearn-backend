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

function loadstarcolor () {
  $(".star" ).each(function() {
    var n = $(this).attr('data-rate');
    for(var i = 0; i < n; i++) {
      $(this).find('span').eq(i).css('color', '#FFD567')
    }
  });
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
