const   questions		= 	$('.questions'),
        content			= 	$('.characters'),
        partner			= 	$('.partner li'),
        partner_pics	= 	$('[data-step="6"] > img'),
        place			= 	$('.place li'),
        place_pic		= 	$('.characters > [data-step="1"] > img'),
        level			= 	$('.level'),
        bg			    = 	$('#bg'),
        cta			    = 	$('.next, .back'),
        preload 		= 	$('.preload');

let     selected_partner   =    'stepsis',
        selected_place     =    'city',
        $window            =    $(window),
        lastWidth          =    $(window).width(),
        currentViewport,
        initialViewport,
        character,
        filename;

$(function() {

        cta.click(function(){
        var clicked     = $(this),
        currentId   = parseInt(clicked.closest('.step-item').attr('data-step')),
        nextId      = clicked.hasClass('back') ? currentId - 1 : currentId + 1,
        currentStep = $('[data-step="'+currentId+'"]'),
        nextStep    = $('[data-step="'+nextId+'"]');

        if(nextStep.length && nextId > 0){

            level.text('Level '+ nextId);

            if (nextId == 2) {
                $('#bg').attr('class', 'step2');
            }
            if (nextId == 3) {
                $('#bg').attr('class', 'step3');
            }
            if (nextId == 4) {
                $('#bg').attr('class', 'step4');
            }
            if (nextId == 5) {
                $('#bg').attr('class', 'step5');
            }
            if (nextId == 6) {
                $('#bg').attr('class', 'step2');
                $('#bg').addClass('blurry');
            }
            if (nextId == 7) {
                $('#bg, body').attr('class', 'step7');
                $('.adultonly').hide();
            }
            if (nextId == 8) {
                $('#bg, body').attr('class', 'step8');
            }
            if (nextId == 9) {
                $('#bg').attr('class', 'step9');
                $('body').attr('class', '');
            }
            if (nextId == 10) {
                $('body').attr('class', 'step10');
                $('#bg, header').hide();
                $('video').show();

                $('.meter span').animate({
                    width: '100%'
                },{
                    duration: 10000,
                    complete: function() {
                        $('body').attr('class', 'step11');
                        questions.find('[data-step="10"]').hide();
                        questions.find('[data-step="11"]').addClass('in').show();
                    }
                });

                setTimeout(function() {
                    $('[data-step="12"] h3 span').text('loading: calculating fps');	
                }, 2000);
                setTimeout(function() {
                    $('[data-step="10"] h3 span').text('browser verification');	
                }, 4200);
                setTimeout(function() {
                    $('[data-step="10"] h3 span').text('setting gsync');	
                }, 6000);
                setTimeout(function() {
                    $('[data-step="10"] h3 span').text('connecting to server');	
                }, 7900);
            }

            /*
            if (nextId <= 4) {
                currentStep.hide();
                nextStep.addClass('in').show();
            }
            else if (nextId >= 5) {
                questions.find(currentStep).hide();
                questions.find(nextStep).addClass('in').show();
            }
            */

            currentStep.hide();
            nextStep.addClass('in').show();
            
        }
        });

        place.click(function(){
            selected_place = $(this).attr('id');

            place.removeClass('active');
            $(this).addClass('active');

            place_pic.removeClass('in');
            place_pic.each(function() {
                if($(this).attr('id') == selected_place) {
                    $(this).addClass('in');
                }
            });
        });

        partner.click(function(){
            selected_partner = $(this).attr('id');

            partner.removeClass('active');
            $(this).addClass('active');

            partner_pics.removeClass('selected');
            partner_pics.each(function() {
                if($(this).attr('id') == selected_partner) {
                    $(this).addClass('selected');
                }
            });

        });

        setTimeout(function() {
            $('.characters > [data-step="1"] > img:nth-of-type(1)').addClass('in');	
        }, 10);

        window.setInterval(function () {
            $('.participants span').text((Math.random() * (190.000 - 192.000) + 192.000).toFixed(3).replace('.',','));
        }, 5000);

        function resize() {	
            if (window.matchMedia("(orientation: portrait)").matches) {
                currentViewport = 'portrait';
            }
            else currentViewport = 'landscape';
                
            if(initialViewport !== currentViewport) {
                play_niche();
                initialViewport = currentViewport;	
            }	
        }

        function play_niche() {	
                $('#videobg').attr("src", 'media/'+currentViewport+'.mp4');
                document.getElementById('videobg').play();     
        }

        $window.resize(function() {
            if($(window).width() != lastWidth) {
                resize();
                lastWidth = $(window).width();
            }
        }).trigger('resize');

        resize();

});