<?php
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="robots" content="noindex, nofollow" />
		<title>Survey</title>
        <meta name="viewport" content="user-scalable=false, initial-scale=1.0, maximum-scale=1.0">
        <meta content="" name="keywords">
        <meta content="" name="description">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css?v=<?=strtotime("now")?>">
		<link rel="stylesheet" type="text/css" href="assets/animate.min.css">
</head>
<body>
	<div class="wrapper">

		<div class="flow">

			<!--step1-->
			<div class="step" data-step="1" data-effect="left">
				<div class="container">
					<div>
						<h1>Dear Home Depot Shopper,</h1>
						<p>
							<strong>Congratulations!</strong><br />
							Complete the short survey about <strong>Home Depot</strong> to select your exclusive offer of up to <strong>$100.00</strong> cash value.<br />
							<br />
							This special is available until <strong>June 23, 2022</strong><br />
							<br />
							TIME REMAINING: 
						</p>
					</div>
					<img src="assets/gift.png">
				</div>
				<ul class="cta-block">
                    <li class="active">Accept</li>
                </ul>
			</div>


		</div>

		<footer>
		<span class="links">
				<a href="?page=privacy" target="_blank">Privacy Policy</a> &nbsp; · &nbsp;
				<a href="?page=terms" target="_blank">Terms &amp; Conditions</a>&nbsp; · &nbsp;
		</span>
		<p>	
			2022 All Rights Reserved.<br />
			This is an independent survey and marketing website which is not affiliated with or endorsed by Home Depot or any online retailer or brand. 
			This website does not claim to represent or own any of the trademarks, tradenames or rights associated with any of the offers which are the property of 
			their respective owners who do not own, endorse, or promote this website. All images on this website are readily available in various places on the 
			Internet and believed to be in public domain according to the U.S. Copyright Fair Use Act. Offer shipping and handling fees may apply. *See manufacturer's 
			site for details as terms may vary with offers. This website receives compensation in exchange for promoting third party offers. See important terms and 
			conditions regarding this survey, site, and advertisement here. 
		</p>
		</footer>

	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
$(document).ready(function () {
	
	//example of vars that must be validated
    const   first_name = $('[name="first_name"]');
   
	$('.cta:not(.submit_form):not(.no_issue):not(.back)').on("click", function () {
		currentStep = parseInt($(this).closest(".step").attr("data-step")),
		nextStep	= currentStep + 1;

		//example how validation must be done
		if(currentStep === 3) {
			if(first_name.val().length < 1) {
				first_name.addClass('err animate__animated animate__bounce');
				if(!first_name.next('.msg').length) first_name.after('<div class="msg">This field is required.</div>');
				return;
			}
		}

		if(nextStep === 7) {
			$('.meter3 span').animate({
				width: '100%'
			},{
				duration: 15000,
				step: function(now,fx) {
					$('[data-step="7"] load span').html(parseInt(now) + '%');
				},
				complete: function() {
					show_step(7, 8);
				}
			});
			var i = 1;
			setInterval(function() {
				$('[data-step="7"] .list_status span').eq(i).html('<img src="assets/tick.png"> ' + status[i]);
				i++;
				$('[data-step="7"] .list_status span').eq(i).show();
			}, 3000);
		}

		if(nextStep === 14) {
			$('.meter4 span').animate({
				width: '100%'
			},{
				duration: 15000,
				step: function(now,fx) {
					$('[data-step="14"] load span').html(parseInt(now) + '%');
				},
				complete: function() {
					show_step(14, 15);
				}
			});
			var i = 1;
			setInterval(function() {
				$('[data-step="14"] .list_status span').eq(i).html('<img src="assets/tick.png"> ' + prescription[i]);
				i++;
				$('[data-step="14"] .list_status span').eq(i).show();
			}, 3000);
		}

		$(window).scrollTop(0);
		show_step(currentStep, nextStep);
    });
	
	
	function show_step(old_step, new_step) {
		var $old_step = $('[data-step=' + old_step + ']'),
			$new_step = $('[data-step=' + new_step + ']');

		$old_step.hide();
		$new_step.show();		
	}
	
	$('.no_issue').on("click", function () {
		show_step(4, 17);
	});
	$('.back').on("click", function () {
		show_step(17, 4);
	});
	
	$(document).on('focus', 'textarea,input,select', function() {
		$(this).removeClass("err animate__animated animate__bounce");
		$(this).next(".msg").remove();
    });

	var data = [
		'Browser settings',
		'Checking Browser Settings...',
		'Fingerprinting Browser...',
		'Checking If Browser Up to Date...',
		'Checking Browser Security Settings...',
		'Opening Secure Connection...'
	];

	var status = {
		1: 'Available in {$St}',
		2: 'Patient Elegible',
		3: '4 Providers Found',
		4: '1 Provider Found'
	};

	var prescription = {
		1: 'Qualified for FREE Shipping',
		2: 'Found Pharmacy Licensed in {$St}',
		3: 'Generic Viagra Stock Available',
		4: 'Qualified for 50% Discount'
	};

	// animation step 1
	var i = 0;

	$('.meter1 span').animate({
		width: '100%'
	},{
		duration: 3000,
		complete: function() {
			$('.meter1 span').css('width', '0');
		}
	});

	setInterval(function() {
			$('.meter1 span').animate({
				width: '100%'
			},{
				duration: 3000,
				step: function(now,fx) {
					$('[data-step="1"] load:nth-of-type(1)').html(data[i]);
				},
				complete: function() {
					$('[data-step="1"] .meter1 span').css('width', '0');
				}
			});
			i++;
	}, 3000);

	$('.meter2 span').animate({
		width: '100%'
	},{
		duration: 18000,
		step: function(now,fx) {
            $('[data-step="1"] load:nth-of-type(2) span').html(parseInt(now) + '%');
        },
		complete: function() {
			show_step(1, 2);
		}
	});
	// end animation step 1

	$("select").change(function() {
		$(this).addClass('selected');
	});
	
});
</script>
</body>
</html>