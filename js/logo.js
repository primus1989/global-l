function diplay_hide (blockId)
{ 
    if ($(blockId).css('display') == 'none') 
        { 
          /* $(blockId).animate({height  : 'show'}, 3000); 
           $(blockId).animate({color  : '#991613'}, 3500);
            $(blockId).animate({marginTop  : '0px'}, 2, function() {
            	//$('#logo-panel').fadeIn('slow');
            	$('#logo-panel').show();
            });*/
             
            $('#logo-panel').show();
        } 
} 