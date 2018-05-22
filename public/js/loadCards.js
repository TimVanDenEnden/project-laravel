// First launch!
resetCards('open-top-menu');

$(document).ready(function() 
{
    $(".top-menu").click(function(event) 
    {
		if (!$(this).hasClass("active-top-menu")) 
		{
		    // Remove the other one.
			resetMenu(event.target.id);
    	}
    });
});

function resetMenu(id)
{
	// Set the correct menu.
	switch(id) 
	{
	    case 'open-top-menu':
	        $("#closed-top-menu").removeClass("active-top-menu");	
	        break;
	    case 'closed-top-menu':
		  		$("#open-top-menu").removeClass("active-top-menu");	
	        break;
	}

	// Add the active class to correct menu item
	$('#' + id).addClass("active-top-menu");

	resetCards(id); 
}

function loadCards(id)
{
	$.getJSON('/loadTasks', function(data) {

		$.each(data, function(i, card) {
			// add the cards
			checkCard(id, card);
		});

	});
}

// Load the correct cards!
function resetCards(id)
{
	$('#cards').fadeOut(function(){

		// Make it empty
		$('#cards').empty();

		$("#cards").css("display", "flex");

		// Load the cards
		loadCards(id);


	});
}

function checkCard(status, card)
{
	// Set the correct status we need.
	switch(status) 
	{
	    case 'open-top-menu':
	        theStatus = 0;	
	        break;
	    case 'closed-top-menu':
		  	theStatus = 1;	
	        break;
	}

	// Only add the correct cards.
	if (card.status == theStatus)
	{
		addCard(card);
;	}
}

function addCard(card)
{
	$("#cards").append("<div class='col-sm-12 col-md-6 col-lg-4' id='theCard-" + card.id + "'></div>");
	$("#theCard-" + card.id).append("<div class='card'><h3 class='padding-h3'>" + card.title + "</h3><p class='padding-p'>" + card.description + "</p><hr><div class='flex padding-small'><div class='col-8 padding-0'><div class='flex'><i class='material-icons time-icon'>access_time</i><span class='time-text'>" + card.date + "</span></div></div><div class='col-4 padding-0'><a href='/edit/"+ card.id +"' class='edit-icon'><i class='material-icons time-icon'>edit</i></a></div></div></div>").fadeIn();
}



