(function($) {
  'use strict';
  $(function() {
    $('[data-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
  
  $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;"/> <input type="text" name="size[]" id="size" placeholder="size" style="width:120px;"/> <input type="text" name="price_retail[]" id="price_retail" placeholder="Price Retail" style="width:120px;"/> <input type="text" name="price_reseller[]" id="price_reseller" placeholder="Price Reseller" style="width:120px;"/> <input type="text" name="profit[]" id="profit" placeholder="Profit" style="width:120px;"/> <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"/> <a href="javascript:void(0);" class="remove_button"> Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
		});
	});
	
	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel');
		var deleteFunction = $(this).attr('rel1');
		swal({
			title:'Are you Sure?',
			text:"You won't be able to revert this!",
			type:'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, cancel!',
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-danger',
			buttonStyling: false,
			reverseButtons: true
		},
		function(){
			window.location.href="/admin/"+deleteFunction+"/"+id;
		});
	});
})(jQuery);