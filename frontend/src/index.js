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
// grading page, dynamic deductions
var current_score = 100;
var current_deduction_applied_list = [];
var deduction_list = [
	// ["0", "DO NOT RESUBMIT. YOU ARE DONE. YOUR GRADE HAS BEEN HUMAN VERIFIED BY A BACKREADER"],
	["-15", "MINMAX METHOD DOES BRUTE FORCE WORK BY TESTING EACH VALUE AGAINST BOTH MIN AND MAX".toLowerCase()],
	["-5", "ISPRIME USED UNNEEDED BOOLEAN VARIABLE(S). NONE ARE NEEDED".toLowerCase()],
	["-5", "ISPRIME METHOD GOES BEYOND N/2 IN TESTING DIVISORS".toLowerCase()],
	["+5", "ISPRIME METHOD STOPS TESTING FACTORS AT SQUARE ROOT OF N WHICH IS THE MINIMAL".toLowerCase()]
	// ["-5", "ISPRIME METHOD SHOULD RETURN IMMEDIATELY UPON DETECTING A FACTOR. YOU ARE BEING INEFFICENT BY TESTING MORE FACTORS AFTER 1ST ONE IS DETECTED"],
	// ["-5", "ISPERFECT USED UNNEEDED BOOLEAN VARIABLE(S). NONE ARE NEEDED"],
	// ["-5", "ISPERFECT METHOD GOES BEYOND N/2 IN TESTING DIVISORS"],
	// ["-5", "ISPERFECT METHOD USES AN IF ELSE TO RETURN THE BOOLEAN"]
];

function genLi(n, point, reason) {
	var n = '<div class="form-check">'
		+ '<input class="form-check-input grading-checkbox-deduction" type="checkbox" value="" id="defaultCheck' + n + '" data-points="'+point+'" >'
		+ '<label class="form-check-label" for="defaultCheck' + n + '">'
		+ '<code>' + point + '</code> ' + reason
		+ '</label>'
		+ '</div>';
	return n;
}

// load all deductions on page load
var deduction_parent = $('div#grading-deductions');
deduction_parent.html("");
for (var i=0; i<deduction_list.length; i++) {
	var p = deduction_list[i][0];
	var r = deduction_list[i][1];
	deduction_parent.html(deduction_parent.html() + genLi(i, p, r));
}

function setOnChangeHandler() {
	var nd = $('input.grading-checkbox-deduction');
	nd.off('change');
	nd.on('change', function (e) {
		// console.log( $(this).attr('data-points') );
		var sign = $(this).get(0).checked ? 1 : -1;
		var addPoints = parseFloat($(this).attr('data-points'));

		current_score += sign * addPoints;
		console.log( 'current_score == ' + current_score);
		$('#grading-score').html(current_score);
	});
}

setOnChangeHandler();

$('button#grading-add-deduction').on('click', function (e) {

	e.preventDefault();

	var p = $('input#grading-points').val();
	var r = $('input#grading-reason-text').val();

	/*var ck = $('div.form-check');
	ck = ck[ck.length - 1];

	var i = $(ck).find('div input').id;
	i = parseInt(i[i.length - 1]);*/

	deduction_parent.html(deduction_parent.html() + genLi(deduction_list.length+1, p, r));
	setOnChangeHandler();

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
