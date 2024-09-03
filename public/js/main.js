$(document).ready(function() {

  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

    $.extend($.expr[':'], {
      'containsi': function (elem, i, match, array) {
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
      }
    });

    $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
      $(this).attr('visible', 'false');
    });

    $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
      $(this).attr('visible', 'true');
    });

    var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

    if (jobCount == '0') { $('.no-result').show(); }
    else { $('.no-result').hide(); }
  });


    // Toggle Password Input Visibility

    $('.rlf-hd-hide').on('click', function(){
      let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
      targetInput.attr('type', 'text');
      $(this).siblings('.rlf-hd-show').removeClass('d-none');
      $(this).addClass('d-none');

    });

    $('.rlf-hd-show').on('click', function(){
      let targetInput = $(this).parents('.rlf-hd').siblings('.psw_input');
      targetInput.attr('type', 'password');
      $(this).siblings('.rlf-hd-hide').removeClass('d-none');
      $(this).addClass('d-none');
    });


        //NAVBAR TOGGLING
        const menuBtn = $('.menu-btn');
        let menuOpen = false;
        menuBtn.click(function() {
        if(!menuOpen){
            menuBtn.addClass('open');
            $('.nav-sm').animate({left: '0px'});
            menuOpen = true;
        }else{
            menuBtn.removeClass('open');
            $('.nav-sm').animate({left: '-300px'});
            menuOpen = false;
        }
        })
    
        let sideClose = $('.close');
        sideClose.click(function(){
         menuBtn.removeClass('open');
            $('.nav-sm').animate({left: '-300px'});
            menuOpen = false;
        })
    
        //STICKY TOP NAVBAR 
        var navHeight = $("nav.navbar").height();

        var stickyNavTop = $("nav.navbar").offset().top;
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();
            if(scrollTop > stickyNavTop){
              // $("nav.navbar").parents('header').addClass('stiky__pt');
              $("nav.navbar").addClass("sticky");
            }else{
                $("nav.navbar").removeClass("sticky");
                // $("nav.navbar").parents('header').removeClass('stiky__pt');
            }
        };
        $(window).scroll(function(){
            stickyNav();
        });

    
});