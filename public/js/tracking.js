(function () {
	function track(eventName, params) {
		if (typeof window.gtag !== 'function') {
			return;
		}

		window.gtag('event', eventName, Object.assign({
			page_language: document.documentElement.lang,
			page_path: window.location.pathname
		}, params || {}));
	}

	window.pellegrinosTrack = track;

	document.addEventListener('click', function (event) {
		var link = event.target.closest('[data-track]');
		if (link) {
			track(link.dataset.track, { link_url: link.href });
		}
	});
})();
