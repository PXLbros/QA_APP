var $form;

$(document).ready(function()
{
	$form = $('#formyform');

	$('.accordionButton').click(function()
	{
		//slide
		$('.accordionButton').removeClass('on');
		$('.accordionContent').slideUp('normal');

        //whitebackground
        $('.accordionButton').not(this).removeClass('hover1');
        $(this).toggleClass('hover1');

		//headercolorchange
 		var bgcol = $(this).css('backgroundColor');
		$(this).children('h4').css('color', bgcol);

		//headercolorchangewhite
		var thish4 = $(this).children('h4');
		$('h4').not(thish4).css('color', 'white');

		if( $(this).children('h4').css('color', bgcol) === true )
		{
			$(this).children('h4').css('color', 'white');
		}
		//plusminus
		var plussign = $(this).children('h4.plus');
		$('.accordionButton').children('h4.plus').not(plussign).html('+');

		if( plussign.html() == '+' )
        {
        	plussign.html('-');
        } else {
        	plussign.html('+');
        }

		//borderbottom

		//slide
		if( $(this).next().is(':hidden') === true )
		{
			$(this).addClass('on');

			// Open the slide
			$(this).next().slideDown('normal');
		}
	});

	$('.close').click(function()
	{
		$(this).parent().parent('.accordionContent').slideUp('normal');

		$('html, body').animate({ scrollTop: $(document).height() }, 1000);
	});

	// Add new bug
	$form.find('.newbugbutton').on('click', function()
	{
		var index = $(this).data('index'),
			$page = $('#page_' + index),
			$description = $('#description_' + index),
			$steps_to_reproduce = $('#steps_to_reproduce_' + index),
			page = $page.val(),
			description = $description.val(),
			steps_to_reproduce = $steps_to_reproduce.val();

		// Add
		add_bug(index, page, description, steps_to_reproduce);

		// Clear form
		$page.val('');
		$description.val('');
		$steps_to_reproduce.val('');
	});

	$form.find('.nobugsbutton').on('click', function()
    {
    	console.log('TEST');
    });

    $form.submit(function()
	{
		// Check if title is filled out
		if ( $('#project_title').val() === '' )
		{
			alert('Enter project title!');

			return false;
		}

		// Loop through all types and see if there are any fields filled out
		$('.inputcontainer').find('.page-input').each(function(index, element)
		{
			var $page = $(this),
				page = $page.val(),
				index = $page.data('index'),
				$description = $('#description_' + index),
				description = $description.val(),
				$steps_to_reproduce = $('#steps_to_reproduce_' + index),
				steps_to_reproduce = $steps_to_reproduce.val();

			// If any of the fields are filled out, add
			if ( page !== '' || description !== '' || steps_to_reproduce !== '' )
			{
				// Add
				add_bug(index, page, description, steps_to_reproduce);
			}
		});

		var original_send_report_button_text = $('#sendreportbutton').val();

		$('#sendreportbutton').val('Submitting Report...').prop('disabled', true);

		$.ajax(
		{
			url: '/send.php',
			data: $form.serialize(),
			type: 'POST',
			dataType: 'json'
		}).done(function(result)
		{
			if ( result.error === '' ) // All good
			{
				alert('Sent!');

				clear_form();
			}
			else
			{
				alert(result.error);
			}
		}).always(function()
		{
			$('#sendreportbutton').val(original_send_report_button_text).prop('disabled', false);
		});

		return false;
	});
});

$(window).keydown(function(e)
{
	// If on textarea, allow enter
	if ( $('textarea:focus').length === 1 )
	{
		return;
	}

	// Disable submit on enter
	if ( e.keyCode === 13 )
	{
		e.preventDefault();

		return false;
	}
});

function add_bug(index, page, description, steps_to_reproduce)
{
	var $page_hidden = document.createElement('input');
	$page_hidden.type = 'hidden';
	$page_hidden.name = 'page[' + index + '][]';
	$page_hidden.value = page;
	$page_hidden.className = 'bug-input';
	$form.prepend($page_hidden);

	var $description_hidden = document.createElement('input');
	$description_hidden.type = 'hidden';
	$description_hidden.name = 'description[' + index + '][]';
	$description_hidden.value = description;
	$description_hidden.className = 'bug-input';
	$form.prepend($description_hidden);

	var $steps_to_reproduce_hidden = document.createElement('input');
	$steps_to_reproduce_hidden.type = 'hidden';
	$steps_to_reproduce_hidden.name = 'steps_to_reproduce[' + index + '][]';
	$steps_to_reproduce_hidden.value = steps_to_reproduce;
	$steps_to_reproduce_hidden.className = 'bug-input';
	$form.prepend($steps_to_reproduce_hidden);
}

function clear_form()
{
	// Clear all fields
	$('.page-input, .description-input, .steps-to-reproduce-input').val('');

	// Remove previously added bugs
	$('.bug-input').remove();

	// Close open accordion
	close_the_open_accordion();
}

function close_the_open_accordion()
{
	var $accordion_button = $('.accordionButton.on');

	// No open accordion, abort
	if ( $accordion_button.length === 0 )
	{
		return;
	}

	var $accordion_content = $accordion_button.next('.accordionContent');

	$accordion_button.removeClass('on hover1');
	$accordion_content.slideUp('normal');

	var background_color = $accordion_button.css('backgroundColor');

	$accordion_button.find('h4').css('color', '#FFF');
}