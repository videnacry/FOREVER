// Get input boxes
const ele1 = document.getElementById('post-box');
const ele2 = document.getElementById('comment-box');

// Get the placeholder attributes
const placeholder1 = ele1.getAttribute('data-placeholder');
const placeholder2 = ele2.getAttribute('data-placeholder');

// Set the placeholder as initial content if it's empty
ele1.innerHTML = placeholder1;
ele2.innerHTML = placeholder2;

// Add event listeners
// Focus
ele1.addEventListener('focus', function (e) {
  const value = e.target.innerHTML;
  value === placeholder1 && (e.target.innerHTML = '');
});
ele2.addEventListener('focus', function (e) {
  const value = e.target.innerHTML;
  value === placeholder2 && (e.target.innerHTML = '');
});
// Blur
ele1.addEventListener('blur', function (e) {
  const value = e.target.innerHTML;
  value === '' && (e.target.innerHTML = placeholder1);
});
ele2.addEventListener('blur', function (e) {
  const value = e.target.innerHTML;
  value === '' && (e.target.innerHTML = placeholder2);
});

// Replace inserted "div" in content-editable with "p"
document.execCommand('defaultParagraphSeparator', false, 'p');

// Test
$('#post').on('click', function (e) {
  e.preventDefault();
  console.log($('#post-box').html());
  $('#post-box').text($('#post-box').data('placeholder'));
  // $('#test').html(($(this).parent().parent().prev().children().eq(0).html()));
})