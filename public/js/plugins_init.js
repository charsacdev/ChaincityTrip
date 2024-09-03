$(document).ready(function () {

  // Authentication Swiper Initialization
  if ($('.authSwiper').length > 0) {
    var swiper = new Swiper(".authSwiper", {
      spaceBetween: 30,
      effect: "fade",
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  //Popular Search Swiper Initialization
  if ($('.popularSearchSwiper').length > 0) {
    var swiper = new Swiper(".popularSearchSwiper", {
      spaceBetween: 30,
      effect: "slide",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  // Lightgallery Initialization
  if($('.lightgallery').length > 0){
    $('.lightgallery').lightGallery({
      loop: true,
      thumbnail: true,
      exThumbImage: 'data-exthumbimage'
    });
  }



  // Authentication Input Validation - JQuery validate
  $('#reg-btn').on('click', function(){

    $('#auth_reg_form').validate({
      rules: {
        fullname: "required",
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 8
        },
        confirm_password: {
          required: true,
          minlength: 8
        },
      },
      messages: {
        fullname: "Please enter your fullname",
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long"
        },
        confirm_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
        },
        email: {
          required: "Please provide an email address",
          email: "Please enter a valid email address"
        }
      },
      // submitHandler: function () {
      //   location.href = 'welcome.html';
      // },
      errorElement: "small",
      errorPlacement: function (error, element) {
        // Add the `help-block` class to the error element
        error.addClass("help-block");

        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element.parent('.input-group'));
        }
      },
      highlight: function (element, errorClass, validClass) {
        $(element).parents(".input-group").addClass("has-error").removeClass("has-success");
        $(element).parents(".input-group").removeClass("mb-3").addClass("mb-1");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).parents(".input-group").addClass("has-success").removeClass("has-error");
        $(element).parents(".input-group").removeClass("mb-1").addClass("mb-3");
      }

    });
  });

  

    $('#reset-btn').on('click', function(){
      $('#auth_reset_pswd_form').validate({
        rules: {
          new_password: {
            required: true,
            minlength: 8
          },
          confirm_new_password: {
            required: true,
            minlength: 8,
          },
        },
        messages: {
          new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          },
          confirm_new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
          },
        },
        submitHandler: function () {
          window.location.href = '/password-complete';
        },
        errorElement: "small",
        errorPlacement: function (error, element) {
          // Add the `help-block` class to the error element
          error.addClass("help-block");
  
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element.parent('.input-group'));
          }
        },
        highlight: function (element, errorClass, validClass) {
          $(element).parents(".input-group").addClass("has-error").removeClass("has-success");
          $(element).parents(".input-group").removeClass("mb-3").addClass("mb-1");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".input-group").addClass("has-success").removeClass("has-error");
          $(element).parents(".input-group").removeClass("mb-1").addClass("mb-3");
        }
  
      });
    });


    $('#reset-btn-admin').on('click', function(){
      $('#admin_reset_pswd_form').validate({
        rules: {
          new_password: {
            required: true,
            minlength: 8
          },
          confirm_new_password: {
            required: true,
            minlength: 8,
          },
        },
        messages: {
          new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long"
          },
          confirm_new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
          },
        },
        submitHandler: function () {
          window.location.href = '/admin/password-complete';
        },
        errorElement: "small",
        errorPlacement: function (error, element) {
          // Add the `help-block` class to the error element
          error.addClass("help-block");
  
          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element.parent('.input-group'));
          }
        },
        highlight: function (element, errorClass, validClass) {
          $(element).parents(".input-group").addClass("has-error").removeClass("has-success");
          $(element).parents(".input-group").removeClass("mb-3").addClass("mb-1");
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).parents(".input-group").addClass("has-success").removeClass("has-error");
          $(element).parents(".input-group").removeClass("mb-1").addClass("mb-3");
        }
  
      });
    });

  


  /********************************* DataTables ***************************************/
  //example 1
  var table = $('#example').DataTable({
    createdRow: function (row, data, index) {
      $(row).addClass('selected')
    },
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }
  });

  table.on('click', 'tbody tr', function () {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
      $row.removeClass('selected')
    } else {
      $row.addClass('selected')
    }
  })

  table.rows().every(function () {
    this.nodes().to$().removeClass('selected')
  });



  //example 2
  var table2 = $('#example2').DataTable({
    createdRow: function (row, data, index) {
      $(row).addClass('selected')
    },

    "scrollY": "42vh",
    "scrollCollapse": true,
    "paging": false
  });

  table2.on('click', 'tbody tr', function () {
    var $row = table2.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
      $row.removeClass('selected')
    } else {
      $row.addClass('selected')
    }
  })

  table2.rows().every(function () {
    this.nodes().to$().removeClass('selected')
  });

  // dataTable1
  var table = $('#dataTable1').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable2
  var table = $('#dataTable2').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable3
  var table = $('#dataTable3').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });
  // dataTable4
  var table = $('#dataTable4').DataTable({
    searching: false,
    paging: true,
    select: false,
    lengthChange: false,

  });

  // dataTable5
  var table = $('#example5').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: true,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable6
  var table = $('#example6').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable7
  var table = $('#example7').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });

  // dataTable8
  var table = $('#example8').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });
  // orderTable
  var table = $('#orderTable').DataTable({
    searching: false,
    paging: true,
    select: false,
    info: false,
    lengthChange: false,
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }

  });



  // table row
  var table = $('#dataTable1, #dataTable2, #dataTable3, #dataTable4,  #example3, #example4 ').DataTable({
    language: {
      paginate: {
        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
      }
    }
  });
  $('#example tbody').on('click', 'tr', function () {
    var data = table.row(this).data();
  });


  /****************** Dropify *************************************/
  if($('.dropify').length > 0){
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop your photos here',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.'
      },
      error: {
        'fileSize': 'The file size is too big (2M max).'
      },
      tpl: {
            message: '<div class="dropify-message"><span class="file-icon" /> <p style="font-size: 18px!important; color: #000000; opacity: 0.7;"><b>{{ default }}</b></p><small style="font-size: 14px">Choose at least 5 photos</small><br> <span style="border-bottom: 1px solid; font-size: 14px; color: #000; margin-bottom: 5px;opacity: 0.7;">Upload from device</span></div>',
           
        }
    });
  }


  

 /****************** Dropify *************************************/
  if($('.sortable').length > 0){
    $(".sortable").sortable({
      connectWith: '.sortable',
      items: '.card-draggable',
      revert: true,
      placeholder: 'card-draggable-placeholder',
      forcePlaceholderSize: true,
      opacity: 0.77,
      cursor: 'move'
    });
  }



  // Toggle Password Input Visibility

  $('.rlf-hd-hide').on('click', function () {
    let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
    targetInput.attr('type', 'text');
    $(this).siblings('.rlf-hd-show').removeClass('d-none');
    $(this).addClass('d-none');

  });

  $('.rlf-hd-show').on('click', function () {
    let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
    targetInput.attr('type', 'password');
    $(this).siblings('.rlf-hd-hide').removeClass('d-none');
    $(this).addClass('d-none');
  });


  


//Bootstrap Datepicker

var currentDate = moment().format('MM/DD/YYYY');

$('.input-limit-datepicker').daterangepicker({
    format: 'MM/DD/YYYY',
    minDate: currentDate,
    buttonClasses: ['btn', 'btn-sm'],
    applyClass: 'btn-danger',
    cancelClass: 'btn-inverse',
    isInvalidDate: function (date) {
      // Define the dates you want to disable
      var disabledDates = [
        '2023-11-14',
        '2023-11-18',
        '2023-11-30'
        // Add more dates as needed
      ];

      // Check if the date is in the array of disabled dates
      return disabledDates.includes(date.format('YYYY-MM-DD'));
    },
});

// Set up event listener for date range selection
$('.input-limit-datepicker').on('apply.daterangepicker', function(ev, picker) {
  // picker.startDate and picker.endDate will contain the selected start and end dates
  var startDate = picker.startDate.format('MM/DD/YYYY');
  var endDate = picker.endDate.format('MM/DD/YYYY');

  console.log('Start Date: ', startDate);
  console.log('End Date: ', endDate);
  
  //show the start and end date at the checkin and checkout form
  $('.check-in-ctn').val(startDate);
  $('.check-out-ctn').val(endDate);


  //pass date to livecomponent
  Livewire.emit('getdate',startDate,endDate);



  //convert date from 1/1/2023 to Jan. 1, 2023
  var checkintDate = moment(startDate, "MM/DD/YYYY").format("MMM, DD YYYY");
  var checkouttDate = moment(endDate, "MM/DD/YYYY").format("MMM, DD YYYY");

  var duration = `${checkintDate} - ${checkouttDate}`;
  $('#stayDuration').text(duration);
  
  
  //calculate the number of days between two dates
  // Define the two dates
  var startDate = new Date(startDate);
  var endDate = new Date(endDate);

  // Calculate the difference in milliseconds
  var timeDifference = endDate.getTime() - startDate.getTime();

  // Convert the difference from milliseconds to days
  var daysDifference = Math.ceil(timeDifference / (1000 * 3600 * 24));

  // Display the result
  $('#numOfDays').text(daysDifference);

  //duration
  $(".duration").val(daysDifference);
  Livewire.emit('duration',daysDifference);
});

});

