import './index.scss'
import 'bootstrap';
import './prism.css';
import './prism.js';

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

// grading page, get user name from url
var search = document.location.search;
var username = search ? search.split('who=') : [""];
username = username.length > 1 ? username[1].split('@') : username[0];
username = username.length > 0 ? username[0] : username;
username = username.toUpperCase();
console.log(username);
var gradingTitle = document.getElementById("student-name");
gradingTitle && (gradingTitle.innerHTML = "Welcome Grader " + username);
$(".grading-student-id").html(username);


// dashboard, click on students item
$('a.dashboard-stu-item').on('click', function (e) {
	e.preventDefault();
	window.location.href = 'grading.html?who=' + $(this).html();
});
