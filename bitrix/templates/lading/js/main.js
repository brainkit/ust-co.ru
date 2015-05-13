
$(document).ready(function () {

    $(function () {

// footer bottom
//-----------------------------------------------------------------------------
        var
                $pageWrapper = $('#page_wrap'),
                footer = {
                    $element: $('#footer'),
                    height: null,
                    place: function () {
                        var self = this;
                        self.height = self.$element.outerHeight();
                        $pageWrapper.css({paddingBottom: self.height});
                        self.$element.css({marginTop: -self.height});
                    }
                };

        $(window).on({
            load: function () {
                footer.place();
            },
            resize: function () {
                footer.place();
            }
        });
    });

//-----------------------------------------------------------------------------

    /*****************Video*****************/
    $(".plaer_wrap .video_href-click").click(function () {


        html_video_href = $(".video_wrap .right").find('.video_href').attr("href");

        $(".video_wrap .right").find("#YouFrameVestido").attr("src", html_video_href);
        $(".video_wrap .right").find(".plaer_wrap").hide();
        $(".video_wrap .right").find(".video_href").hide();
        $(".video_wrap .right").find("#YouFrameVestido").show();


    });



    $(".buy_p .byu_img.btn_red").click(function () {

        element_catalog_name = $(this).attr("val"); 
        // ggg= element_catalog_name;

        // $(".buy .left .block_input").find("#model").attr("value", element_catalog_name+", ");
        $('#model').val($('#model').val() + element_catalog_name + "; ");

        //$("html,body").animate({scrollTop: ($(document).height() - 750)}, "slow")
        // $("html,body").animate({scrollTop: (2800)}, "slow");
        // $('body').scrollTo('#formbuy',{duration:'slow', offsetTop : '50'});

    });
 

    $('#feed-back-form').validate({
        rules: {
            user_name: {
                required: true
            },
            user_email:
            {
                required: true,  
                email: true
            }

        },
        messages: {
            user_name: {
                required: "",
              
            },
            user_email:
            {
                required: "",
                email: "E-mail введён некорректно"
            }
        }
    });
    
    $('[name=SIMPLE_FORM_1]').validate({
        rules: {
            form_text_1: {
                required: true
            },
            form_email_3:
            {
                required: true,  
                email: true
            }

        },
        messages: {
            form_text_1: {
                required: ""
            },
            form_email_3:
            {
                required: "",
                email: "E-mail введён некорректно"
            }
        }
    });
    
     $('[name=form_gen_zvonok]').validate({
        rules: {
            form_text_6: {
                required: true
            },
            form_text_7:
            {
                required: true
            } 
        } ,
        messages: {
            form_text_6: {
                required: ""
            },
            form_text_7:
            {
                required: ""
            }
        }
       
    }); 
    
            /* $('[name=SIMPLE_FORM_1] input[type=submit]').attr('disabled','disabled');


    $('[name=SIMPLE_FORM_1] input').change(function(){
        if(form_feedack.valid())
        {
             $('[name=SIMPLE_FORM_1] input[type=submit]').attr('disabled','false');
             //alert(1);
        }
       // alert(1);
      });
    // alert(test)/* ;*/

$(".element_catalog").hover(
    function(){
		$(this).find('.element_catalog_bg').stop(true,true).fadeOut();
    },

    function(){
      $(this).find('.element_catalog_bg').stop(true,true).fadeIn();
    }

);

$(".element_catalog_bg").each(function() {

  $( this ).css("width",$( this ).parent().width());
  $( this ).css("height",$( this ).parent().height());
  
});
$(".element_catalog_bg1").each(function() {

  $( this ).css("width",$( this ).parent().width());
  $( this ).css("height",$( this ).parent().height());
  
});
  
$(document).on("click", "#feed-back-form .btn_red", function(){
    setTimeout(function(){
        $(".bx-core-waitwindow").hide();
    }, 200);
});



});
