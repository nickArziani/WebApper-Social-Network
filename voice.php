<script>
		var rec = new webkitSpeechRecognition();
		rec.lang = 'ru';
		rec.onresult = function(e){
			var rez = e.results[e.resultIndex];
			var str = rez[0].transcript;
			console.log(str);
		}
		rec.start();
</script>