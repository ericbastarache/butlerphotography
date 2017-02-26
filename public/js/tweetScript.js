$(document).ready(function () {
	var details = "Check out this blog post by @e_s_butler";
	var linkToPost = window.location.href;
	$('.twitter-icon').on('click', function () {
		tweetUrl();
	});

	function tweetUrl() {
		window.open('https://twitter.com/intent/tweet?text=' + details + ' ' + linkToPost);
	}
});