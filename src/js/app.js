// Event listener to remove "fake" placeholder in content editable div
$('.text-box').on('focus', function (e) {
  $(e.target).text('');
})
// Event listener to add "fake" placeholder in content editable div
$('.text-box').on('blur', function (e) {
  $(e.target).text($(e.target).data('placeholder'));
})