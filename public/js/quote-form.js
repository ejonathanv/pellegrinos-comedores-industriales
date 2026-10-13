(function () {
	'use strict';

	function syncConditionalFields(form) {
		var service = form.querySelector('[data-quote-service]').value;

		form.querySelectorAll('[data-show-for]').forEach(function (group) {
			var visible = group.getAttribute('data-show-for').split(' ').indexOf(service) !== -1;

			group.hidden = !visible;
			group.querySelectorAll('[data-required]').forEach(function (field) {
				field.required = visible;
			});
		});
	}

	document.querySelectorAll('.quote-form').forEach(function (form) {
		var select = form.querySelector('[data-quote-service]');
		var submit = form.querySelector('[data-quote-submit]');

		syncConditionalFields(form);
		select.addEventListener('change', function () {
			syncConditionalFields(form);
		});

		form.addEventListener('submit', function (event) {
			if (window.grecaptcha && form.querySelector('.g-recaptcha') && window.grecaptcha.getResponse().length === 0) {
				event.preventDefault();
				alert(form.getAttribute('data-captcha-message'));
				return;
			}

			submit.disabled = true;
		});
	});
})();
