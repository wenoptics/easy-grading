import './index.scss'
import 'bootstrap';

// login.html
$('form#login-form').on('submit', function(e) {

	e.preventDefault();
	window.location.href = ('dashboard.html?who=' + $("#input-login-email").val());

});


// grading.html
$('button#grading-add-deduction').on('click', function (e) {

	e.preventDefault();

	var p = $('input#grading-points').val();
	var r = $('input#grading-reason-text').val();

	function genLi(n, str) {
		return '<div class="form-check">'
			+ '<input class="form-check-input" type="checkbox" value="" id="defaultCheck'+n+'">'
			+ '<label class="form-check-label" for="defaultCheck'+n+'">'
			+ str
			+ '</label>'
			+ '</div>'
	}

	var ck = $('div.form-check');
	ck = ck[ck.length - 1];

	var i = $(ck).find('div input').id;
	i = parseInt(i[i.length - 1]);

	var parent = $('div#grading-deductions');
	parent.html(parent.html() + genLi(i + 1, p + ' ' + r));

	return false;
});
