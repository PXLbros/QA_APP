/***********************************************************************************************************************
DOCUMENT: includes/javascript.js
DEVELOPED BY: Ryan Stemkoski
COMPANY: Zipline Interactive
EMAIL: ryan@gozipline.com
PHONE: 509-321-2849
DATE: 3/26/2009
UPDATED: 3/25/2010
DESCRIPTION: This is the JavaScript required to create the accordion style menu.  Requires jQuery library
NOTE: Because of a bug in jQuery with IE8 we had to add an IE stylesheet hack to get the system to work in all browsers. I hate hacks but had no choice :(.
************************************************************************************************************************/
$(document).ready(function() {

	//ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
	$('.accordionButton').click(function() {

		//REMOVE THE ON CLASS FROM ALL BUTTONS
		$('.accordionButton').removeClass('on');

		//NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
	 	$('.accordionContent').slideUp('normal');

		//IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
		if($(this).next().is(':hidden') == true) {

			//ADD THE ON CLASS TO THE BUTTON
			$(this).addClass('on');

			//OPEN THE SLIDE
			$(this).next().slideDown('normal');
		 }

	 });

	 $('.close').click(function() {
	 	console.log('hi');
	 	$(this).parent().parent('.accordionContent').slideUp('normal');
	 	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
	 });




	$('#formyform').find('.newbugbutton').on('click', function()
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
		$('#formyform').prepend($page_hidden);

		var $description_hidden = document.createElement('input');
		$description_hidden.type = 'hidden';
		$description_hidden.name = 'description[' + index + '][]';
		$description_hidden.value = description;
		$('#formyform').prepend($description_hidden);

		var $steps_to_reproduce_hidden = document.createElement('input');
		$steps_to_reproduce_hidden.type = 'hidden';
		$steps_to_reproduce_hidden.name = 'steps_to_reproduce[' + index + '][]';
		$steps_to_reproduce_hidden.value = steps_to_reproduce;
		$('#formyform').prepend($steps_to_reproduce_hidden);

		// Clear form
		$page.val('');
		$description.val('');
		$steps_to_reproduce.val('');
	});

	$('#formyform').find('.nobugsbutton').on('click', function()
    {

    	console.log('TEST');

    });
	
	
	/********************************************************************************************************************
	CLOSES ALL S ON PAGE LOAD
	********************************************************************************************************************/	
	$('.accordionContent').hide();

});
