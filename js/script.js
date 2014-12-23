(function($){ 
		$.fn.extend({  
				tabify: function( callback ) {
         	
						function getHref(el){
								hash = $(el).find('a').attr('href');
								hash = hash.substring(0,hash.length-4);
								return hash;
						}
			
						function setActive(el){
		 		
								$(el).addClass('active');
								$(getHref(el)).fadeIn('slow');
								$(el).siblings('li').each(function(){
										$(this).removeClass('active');
										$(getHref(this)).hide();
								});
						}
			
						return this.each(function() {
			
								var self = this;
								var	callbackArguments 	=	{
										'ul':$(self)
								};
					
								$(this).find('li a').each(function(){
										$(this).attr('href',$(this).attr('href') + '-tab');
								});
				
								function handleHash(){
					
										if(location.hash && $(self).find('a[href=' + location.hash + ']').length > 0){				
												setActive($(self).find('a[href=' + location.hash + ']').parent());
										}
								}
				
								if(location.hash){
										handleHash();
								}
					
								setInterval(handleHash,100);
				
								$(this).find('li').each(function(){
										if($(this).hasClass('active')){
												$(getHref(this)).show();
										} else {
												$(getHref(this)).hide();
										}
								});
				
								if(callback){
										callback(callbackArguments);
								}	
				
						}); 
				} 
		}); 
})(jQuery);$(document).ready(function() {
                        $("ul li:eq(0)").addClass("active");
                        $('#navi').tabify();
    
    					var AvatarDir = 'assets/parts/';
						
						
                        $("#generate").click(function(){
                            $.post("classes/Save.php", $("#AvatarInputs").serialize(), function(data) {
                            location = "show.php?avatar="+data;
                            }); 
                        })
						
						$('#previews li img').click(function()
						{
							 var ImgID = $(this).attr("id");
							 var ImgClass = $(this).attr("class");
							 var ImgName = AvatarDir+ImgClass+"/"+$(this).attr("data");
							 var ParentID = $('.'+ImgClass).closest('div').attr('id');
							 var InputValue = ImgClass+"/"+$(this).attr("data").replace('.png','');
							 $("#RealAvatar ."+ImgClass).attr('src', ImgName); 
							 $('#AvatarInputs .'+ImgClass).val(InputValue);                             
						});
});