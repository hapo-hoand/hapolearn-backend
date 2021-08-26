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

  $(".star" ).each(function() {
    var n = $(this).attr('data-rate');
    for(var i = 0; i < n; i++) {
      $(this).find('span').eq(i).css('color', '#FFD567')
    }
  });

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

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#nameLesson').on('keyup',function(){
    $value = $(this).val();
    $id = $('#CourseID').val();
    $.ajax({
      type: 'post',
      url: "/searchlesson",
      data: {
          'name': $value,
          'id': $id
      },
      dataType: 'json',
      success:function(data){
        // var array = JSON.stringify(data);
        // var lesson = JSON.parse(array);
        // var n = lesson.lenght;
        // var a = '';
        // console.log(array[0]['title']);
        // jsonData = JSON.parse(data);
        console.log(data);
        // for(var i = 0; i < JSON.parse(lesson).lenght; i++) {
        //   a += '<div class="number text-center">';
        //   a += i + 1;
        //   a += '</div>';
        //   a += '<div class="desc-lesson">'
        //   a += '<a href="#">' + lesson[i]['desc'] +  '</a>';
        //   a += '</div>'
        //   a += '<div class="text-right link-lesson">';
        //   a += '<a href="#" class="btn link-course">Learn</a>'
        //   a += '</div>'
        //   console.log(lesson[i]['desc']);
        // }

        $('#item-lesson').html(a);
      }
    });
  })

  $('#takecourse').on('click', function(e) {
    e.preventDefault();
    $id = $('#CourseID').val();
    $cost = $('.price .info-data').attr('data-value');
    
    if ($cost == '0') {
      $price = '';
      window.location.href = "/takethiscourse/" + $id
    }
    else {
      $price = $cost + '$';
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
          window.location.href = "/takethiscourse/" + $id
        }
      })
    }
  })
});
