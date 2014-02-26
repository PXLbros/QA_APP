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

		var plussign = $(this).children('h4.plus');
		$('.accordionButton').children('h4.plus').not(plussign).html('+');

		if( plussign.html() == '+' )
        {
        	plussign.html('-');
        } else {
        	plussign.html('+');
        }
		console.log(plussign.html());

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

	$form.find('.newbugbutton').on('click', function()
	{
		var index = $(this).data('index'),
			$page = $('#page_' + index),
			$description = $('#description_' + index),
			$steps_to_reproduce = $('#steps_to_reproduce_' + index),
			page = $page.val(),
			description = $description.val(),
			steps_to_reproduce = $steps_to_reproduce.val();

		var $page_hidden = document.createElement('input');
		$page_hidden.type = 'hidden';
		$page_hidden.name = 'page[' + index + '][]';
		$page_hidden.value = page;
		$form.prepend($page_hidden);

		var $description_hidden = document.createElement('input');
		$description_hidden.type = 'hidden';
		$description_hidden.name = 'description[' + index + '][]';
		$description_hidden.value = description;
		$form.prepend($description_hidden);

		var $steps_to_reproduce_hidden = document.createElement('input');
		$steps_to_reproduce_hidden.type = 'hidden';
		$steps_to_reproduce_hidden.name = 'steps_to_reproduce[' + index + '][]';
		$steps_to_reproduce_hidden.value = steps_to_reproduce;
		$form.prepend($steps_to_reproduce_hidden);

		// Clear form
		$page.val('');
		$description.val('');
		$steps_to_reproduce.val('');
	});

	$form.find('.nobugsbutton').on('click', function()
    {
    	console.log('TEST');
    });
});
