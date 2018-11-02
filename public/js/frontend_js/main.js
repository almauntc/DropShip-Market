/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

$(document).ready(function(){
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == ""){
			return false;
		}
		$.ajax({
			type:'get',
			url :'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
				/*alert(resp);*/
				var arr = resp.split('#');
				$("#getPrice").html(""+arr[0]);
				$("#price_retail").val(arr[1]);
				$("#price_reseller").val(arr[2]);
				$("#profit").val(arr[3]);
				//$("#getPrice").hide();
				if(arr[4]==0){
					$("#cartButton").hide();
					$("#Availability").text("Stok Habis");
				}else{
					$("#cartButton").show();
					$("#Availability").text("Ada Stok");
				}
				
			},error:function(){
				alert("Error");
			}
		});
	});
});


 $('#my_button').click(function(){
 	var form = $(this).parents('form:first');
     $('#my_button').attr("disabled", true);
      $('#my_button').css('opacity', 0.5);
    form.submit();
 });

 $('#form_id').submit(function() {
    $("input[type='submit']", this)
      .val("Please Wait...")
      .attr('disabled', 'disabled');
    return true;
  });

