/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {
    

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });
    
    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);
    

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });

        
    /*----------------------------------------------------
     Language Flag js 
    ----------------------------------------------------*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });
    /*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	    rangeSlider.slider({
		range: true,
		min: minPrice,
        max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('$' + ui.values[0]);
			maxamount.val('$' + ui.values[1]);
		}
	});
	minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*-------------------
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });
    
    /*-------------------
		Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});

    $('.product-pic-zoom').zoom();
    
    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var  $button = $(this);
		var oldValue = $button.parent().find('input').val();
        var max_stock = parseInt($button.parent().find('input').attr('max'));
		if ($button.hasClass('inc') && oldValue < max_stock) {
			var newVal = parseFloat(oldValue) + 1;
		}else if($button.hasClass('inc') && oldValue == max_stock){
            var newVal = parseFloat(oldValue);
        }else {
			// Don't allow decrementing below zero
			if (oldValue > 1) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 1;
			}
		}
		$button.parent().find('input').val(newVal);
	});

   

    $('.send_message').click(function(){
        var username = $(this).parent().parent().find('#username').val();
        var email = $(this).parent().parent().find('#email').val();
        var m_title = $(this).parent().parent().find('#m_title').val();
        var message = $(this).parent().parent().find('#message').val();
        
        if(!username){
         $('#username').attr('placeholder','plece enter your Name*');
         $('#username').addClass('redplaceholder');
        }

        if(!email){
         $('#email').attr('placeholder','plece enter your Email*');
         $('#email').addClass('redplaceholder');
        }

        if(!m_title){
         $('#m_title').attr('placeholder','plece enter your Subject*');
         $('#m_title').addClass('redplaceholder');
        }

        if(!message){
         $('#message').attr('placeholder','plece enter your Message*');
         $('#message').addClass('redplaceholder');
        }

        $.post('design_functions/add_message.php',{username:username,email:email,m_title:m_title,message:message},function(data){
          $('#success_message').html(data);
          $('#username').val('');
          $('#email').val('');
          $('#m_title').val('');
          $('#message').val('');
        });
    })

 /////////////////////////    
 // register code

 var is_email = null ;

    $("#con_password").keyup( function(){
           var password = $(this).parent().parent().find('#password').val();
           var confirmPassword = $(this).parent().find("#con_password").val();
          
            if (password != confirmPassword){
            $("#check_password").html("Password does not match !").css("color","red");
            }
            else{
             $("#check_password").html("Password  match !").css("color","green");
            }
    })

    $("#email").keyup( function(){
      var isemail = $(this).parent().find("#email").val();
      var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (regex.test(isemail) == true) {
            $("#check_isemail").html("").css("color","red");
            is_email = true ;
        }
        else{
            $("#check_isemail").html("Email does not Validation !").css("color","red");
            is_email = false ;
        } 
    })

    $('.send_register').click(function(){
      var first_name = $(this).parent().parent().find('#first_name').val();
      var last_name = $(this).parent().parent().find('#last_name').val();
      var email = $(this).parent().parent().find('#email').val();
      var password = $(this).parent().parent().find('#password').val();
      var con_password = $(this).parent().parent().find('#con_password').val();
        if(!first_name){
            $('#first_name').attr('placeholder','plece enter your First Name*');
            $('#first_name').addClass('redplaceholder');
        }

        if(!last_name){
            $('#last_name').attr('placeholder','plece enter your last Name*');
            $('#last_name').addClass('redplaceholder');
        }
        if(!email){
            $('#email').attr('placeholder','plece enter your Email*');
            $('#email').addClass('redplaceholder');
        }
        if(!password){
            $('#password').attr('placeholder','plece enter your password*');
            $('#password').addClass('redplaceholder');
        }
        if(!con_password){
            $('#con_password').attr('placeholder','plece enter your Password*');
            $('#con_password').addClass('redplaceholder');
           }

        if (first_name && last_name && email && is_email == true && password == con_password)   

        $.post('design_functions/add_user.php',{first_name:first_name,last_name:last_name,email:email,password:password},function(data){
            if(data == "email already exists"){
                $("#check_isemail").html(data+"!").css("color","red");
                $('#password').val('');
                $('#con_password').val('');
            }else{
               //window.location.href='index.php?data='+ data;
                window.location.href='login.php';
            }
        });  

    })


 // comment code    

    $('.send_comment').click(function(){
        var comment = $(this).parent().find('#comment').val();
        var blog_id = $(this).attr('blog_id');

        $.post('design_functions/add_comment.php',{comment:comment,blog_id:blog_id},function(data){
         $("#add_comment").prepend(data);    
         //alert(data);
         $('#comment').val('');
        });
        
    })
 
    
 // update user information code    

    $('.edit_user').click(function(){
        var first_name = $(this).parent().parent().find('#first_name').val();
        var last_name = $(this).parent().parent().find('#last_name').val();
        var email = $(this).parent().parent().find('#email').val();
        var password = $(this).parent().parent().find('#password').val();
        var image = $(this).parent().parent().find('#image').val();

          $.post('design_functions/edit_user.php',{first_name:first_name,last_name:last_name,email:email,password:password,image:image},function(data){
              if(data == "email already exists"){
                  $("#check_isemail").html(data+"!").css("color","red");
                  $('#password').val('');
                  $('#con_password').val('');
              }else{
                
                 window.location.href='index.php';
              }
          });  
  
      })

 // show products category code
   
    $('.category_products').click(function(){
       var category_id = $(this).attr('category_id');

       $.post('design_functions/show_products.php',{category_id:category_id},function(data){
           $('.show_products_category').html(data);
       
       })
    })

 // show blogs category code
   
    $('.category_blogs').click(function(){
        var blogs_id = $(this).attr('blogs_id');
 
        $.post('design_functions/show_blogs.php',{blogs_id:blogs_id},function(data){
            $('.show_blogs_category').html(data);
        
        })
     })

 // add product to cart 

    $('.add_to_cart').click(function(){
       var product_id = $(this).attr('product_id');
       var price = $(this).attr('price');
       var count = $(this).parent().find('#quantity_input').val();
     
        
       $.post('design_functions/add_to_cart.php',{product_id:product_id,price:price,count:count},function(data){
        var new_data = data;
        var new_data_array = new_data.split(',');
        
     
       $('.notice').html(new_data_array[0]);
       $('.total_price_products').html(new_data_array[1]);
       $('.products_in_cart').html(new_data_array[2]);
       //alert(new_data_array[2]);
       }) 
    })

    $(document).on('click','.delete_from_cart',function(){
        var cart_id = $(this).attr('cart_id');
        var product_id = $(this).attr('product_id'); 
        
        $.post('design_functions/delete_from_cart.php',{product_id:product_id,cart_id:cart_id},function(data){
            var new_data = data;
            var new_data_array = new_data.split(',');
            
           $('.notice').html(new_data_array[0]);
           $('.total_price_products').html(new_data_array[1]);
           $('.products_in_cart').html(new_data_array[2]);      
        }) 
     })

     $(document).on('click','.delete_from_shopping_cart',function(){
        var cart_id = $(this).attr('cart_id');
        var product_id = $(this).attr('product_id'); 
        
        $.post('design_functions/delete_from_shopping_cart.php',{product_id:product_id,cart_id:cart_id},function(data){
           var new_data = data;
           var new_data_array = new_data.split(',');
            
           $('.notice').html(new_data_array[0]);
           $('.total_price_products').html(new_data_array[1]);
           $('.new_products_in_cart').html(new_data_array[2]);   
           
           var proQty = $('.pro-qty');
           proQty.prepend('<span class="dec qtybtn">-</span>');
           proQty.append('<span class="inc qtybtn">+</span>');
           proQty.on('click', '.qtybtn', function () {
               var  $button = $(this);
               var oldValue = $button.parent().find('input').val();
               var max_stock = parseInt($button.parent().find('input').attr('max'));
               if ($button.hasClass('inc') && oldValue < max_stock) {
                   var newVal = parseFloat(oldValue) + 1;
               }else if($button.hasClass('inc') && oldValue == max_stock){
                   var newVal = parseFloat(oldValue);
               }else {
                   // Don't allow decrementing below zero
                   if (oldValue > 1) {
                       var newVal = parseFloat(oldValue) - 1;
                   } else {
                       newVal = 1;
                   }
               }
               $button.parent().find('input').val(newVal);
           });
              
        }) 
     })

     $(document).on('click','.edit_cart',function(){
        var cart_id = $(this).attr('cart_id');
        var product_id = $(this).attr('product_id'); 
        var count = $(this).parent().parent().find('#quantity_input').val();
       
        $.post('design_functions/edit_cart.php',{product_id:product_id,cart_id:cart_id,count:count},function(data){
           var new_data = data;
           var new_data_array = new_data.split(',');
            
           $('.notice').html(new_data_array[0]);
           $('.total_price_products').html(new_data_array[1]);
           $('.new_products_in_cart').html(new_data_array[2]);  

           var proQty = $('.pro-qty');
           proQty.prepend('<span class="dec qtybtn">-</span>');
           proQty.append('<span class="inc qtybtn">+</span>');
           proQty.on('click', '.qtybtn', function () {
               var  $button = $(this);
               var oldValue = $button.parent().find('input').val();
               var max_stock = parseInt($button.parent().find('input').attr('max'));
               if ($button.hasClass('inc') && oldValue < max_stock) {
                   var newVal = parseFloat(oldValue) + 1;
               }else if($button.hasClass('inc') && oldValue == max_stock){
                   var newVal = parseFloat(oldValue);
               }else {
                   // Don't allow decrementing below zero
                   if (oldValue > 1) {
                       var newVal = parseFloat(oldValue) - 1;
                   } else {
                       newVal = 1;
                   }
               }
               $button.parent().find('input').val(newVal);
           });
        }) 
     })


 // send rate 
    
    $(document).on('click','.star_rate',function(){
        var yellow_stars_rate = $(this).attr('vall');
       // alert(yellow_stars_rate);

 
       $('.color_rating').html('');
       var yellow_stars = ' ';
       for (let i=1; i <= yellow_stars_rate; i++) {
        yellow_stars +='<i class="fa fa-star star_rate " vall="'+i+'"></i>   ' ; 
       }
       $('.color_rating').html(yellow_stars);
      
       var white_stars =' ';
       for (let i=++yellow_stars_rate; i <= 5; i++) {
        white_stars +='<i class="fa fa-star-o star_rate " vall="'+i+'"></i>   ' ; 
       }
       $('.color_rating').append(white_stars);
       $('.send_rate_and_comment_btn').attr('stars',--yellow_stars_rate);
    })
    
    $('.send_rate_and_comment_btn').click(function(){
         var product_id = $(this).attr('product_id');
         var stars_rate = $(this).attr('stars');
         var comment = $(this).parent().find('#comment').val();
         //alert(product_id);

        if(stars_rate==0 && !comment){
         // alert("please enter your rate");
          $("#check_rate_comment").html("Please Enter Your Rate Or Comment !").css("color","red");
        }else{
        $.post('design_functions/add_rate_comment.php',{stars_rate:stars_rate,comment:comment,product_id:product_id},function(data){
         $("#add_comment").prepend(data);    
         //alert(data);
         $('#comment').val('');
         $("#check_rate_comment").html(" ");
         $("#is_user_send_rate").css("display","none");
         
        });
        }
        
    })
 
    //search products
    $(document).on('keyup','.search_product',function(){
        var search_value = $.trim($('.search_product').val());
    
        if(search_value !== ''){
            $.post('design_functions/search_product.php',{search_value:search_value},function(data){   
                // alert(data)   
                $('.rslt_serch').html(data);
                $('.rslt_serch a').css('color', 'white'); 
                $('.rslt_serch a').css('font-size', '22px'); 
                $('.rslt_serch').css('background-color', '#e7ab3c');    
            })
        } else {
            $('.rslt_serch').hide();
        }
     })

})(jQuery);