(function () {
	var videos = document.querySelectorAll('video[data-lazy-video]');

	function load(video) {
		video.querySelectorAll('source[data-src]').forEach(function (source) {
			source.src = source.dataset.src;
			source.removeAttribute('data-src');
		});
		video.load();
		var playing = video.play();
		if (playing && playing.catch) {
			playing.catch(function () {});
		}
	}

	function observe() {
		if (!('IntersectionObserver' in window)) {
			videos.forEach(load);
			return;
		}

		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					load(entry.target);
					observer.unobserve(entry.target);
				}
			});
		}, { rootMargin: '200px' });

		videos.forEach(function (video) {
			observer.observe(video);
		});
	}

	if (document.readyState === 'complete') {
		observe();
	} else {
		window.addEventListener('load', observe);
	}
})();
