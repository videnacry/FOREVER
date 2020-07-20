// Event listener to remove "fake" placeholder in content editable div
$('#post-box').on('focus', function (e) {
  $(e.target).text('');
})

// Event listener to add "fake" placeholder in content editable div
// $('#post-box').on('blur', function (e) {
//   $(e.target).text($(e.target).data('placeholder'));
// })

// Replace inserted "div" in content-editable with "p"
document.execCommand('defaultParagraphSeparator', false, 'p');

// Test
$('#post').on('click', function (e) {
  e.preventDefault();
  console.log($('#post-box').html());
  $('#post-box').text($('#post-box').data('placeholder'));
  // $('#test').html(($(this).parent().parent().prev().children().eq(0).html()));
})