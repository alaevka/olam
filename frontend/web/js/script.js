
$(document).ready(function(){

	$('#register-link').click(function() {
		var url = $(this).attr('href');
		var modal = $('#registration-modal');
		var modalbody = $('#registration-modal .modal-body');
		$.get(url, function(data) {
			modalbody.html(data);
			modal.modal('show');
		});

		return false;
	});

	$('#login-link').click(function() {
		var url = $(this).attr('href');
		var modal = $('#login-modal');
		var modalbody = $('#login-modal .modal-body');
		$.get(url, function(data) {
			modalbody.html(data);
			modal.modal('show');
		});

		return false;
	});

	var right_persons_block_height = $('.persons').height();
	$('.bottom-new, .bottom-new img').height(right_persons_block_height);

  var submitIcon = $('.searchbox-icon');
  var inputBox = $('.searchbox-input');
  var searchBox = $('.searchbox');
  var isOpen = false;
  submitIcon.click(function(){
   if(isOpen == false){
	searchBox.addClass('searchbox-open');
	inputBox.focus();
	isOpen = true;
  } else {
	searchBox.removeClass('searchbox-open');
	inputBox.focusout();
	isOpen = false;
  }
}); 
  submitIcon.mouseup(function(){
	return false;
  });
  searchBox.mouseup(function(){
	return false;
  });
  $(document).mouseup(function(){
   if(isOpen == true){
	$('.searchbox-icon').css('display','block');
	submitIcon.click();
  }
});
});
function buttonUp(){
 var inputVal = $('.searchbox-input').val();
 inputVal = $.trim(inputVal).length;
 if( inputVal !== 0){
  $('.searchbox-icon').css('display','none');
} else {
  $('.searchbox-input').val('');
  $('.searchbox-icon').css('display','block');
}
}