import './index.scss'
import 'bootstrap';

// login.html
$('form#login-form').on('submit', function(e) {

	e.preventDefault();
	window.location.href = ('dashboard.html?who=' + $("#input-login-email").val());

});


// grading.html
$('button#grading-add-deduction').on('click', function (e) {

	$('input#grading-points').val();
	$('input#grading-reason-text').val();

	'<div class="form-check">'
	+	'<input class="form-check-input" type="checkbox" value="" id="defaultCheck4">'
	+	'<label class="form-check-label" for="defaultCheck4">'
	+	'FYI (no deduction) your text indentation sucks'
	+'</label>'
	+'</div>'

});
