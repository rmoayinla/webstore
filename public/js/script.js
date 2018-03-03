 //moment.js for date manipulation and settings //
 	var moment = moment(); 
 (function($){
 	
 	if(typeof moment !== "undefined")
 	{
 		console.log(moment.format());
 	}
 	
 	$(".with-preview").on("change", function(ev){
 		
 	});
 	
 	


 })(jQuery);

 tinymce.init({
    selector: '.tinymce-editor',
    menubar: false,
    content_css: '',
    browser_spellcheck: true,
    mobile: {
    	theme: 'mobile',
    },
 });

