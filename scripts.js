function loadContent(page) {
  $('#main-content').load(page + '.php');
  $('.nav-link').removeClass('active');
  $('a[onclick="loadContent(\'' + page + '\')"]').addClass('active');
}
