(function(window) {
	var speakword = "Hello";
	var hellospeaker = function (name) {
		console.log(speakword + " " + name);
	}

	window.hellospeaker = hellospeaker;

})(window);