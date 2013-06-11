$('body').on('click','#forgot_pass' ,function(){
  $('#forgotPassModal').modal('show');
  $('.login_btn').popover('hide');
});
$('#forgotPassModal').on('hidden', function(){
  //Cleanup all info when modal is hidden
  $('.email', this).val('');
  $('.message', this).html('').addClass('hidden');

})
$("#forgotPassModal form").submit(function(e){
  e.preventDefault();
  var self = this;
  var data = $(self).serialize();
   $.post('/users/forgotPassword', data, function(data){
    if(data.isValidEmail){
      var doneBtn = document.getElementById("done_btn");
      var submitBtn = document.getElementById("submit_btn");
      var cancelBtn = document.getElementById("cancel_btn");
      submitBtn.style.display = 'none';
      cancelBtn.style.display = 'none';
      doneBtn.style.display = '';
    }
    // console.log(data);
    $('.message', self).removeClass('hidden').html(data.result)
  }, 'json')

});