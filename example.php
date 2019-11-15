<img src="chat.gif">
<div id="text"></div>
<style>
  .text{
    display: block;
    width: 400px;
    height: 800px;
  }
</style>
<script>
function startRecognizer(){
    if ('webkitSpeechRecognition' in window) {
      var recognition = new webkitSpeechRecognition();
      recognition.lang = 'ru';

      recognition.onresult = function (event) {
        var result = event.results[event.resultIndex];
          console.clear();
//Здесь пишутся функции для ответа на вопросы пользователя
          //#1
      if(result[0].transcript.indexOf('Как дела') >= 0){
          var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("Привет у меня всё хорошо. А как у тебя дела?");
   utterThis.lang = 'ru-RU';
  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "Привет у меня всё хорошо. А как у тебя дела?";
          }else if(result[0].transcript.indexOf('Кто ты') >= 0){
                var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("Я сплин, интерактивный бот. Я была создана для улучшения работы вместе с вконтакте");
   utterThis.lang = 'ru-RU';

  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "Я сплин, интерактивный бот. Я была создана для улучшения работы вместе с вконтакте";
          }else if(result[0].transcript.indexOf('Чем ты можешь мне помочь') >= 0){
                var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("Я могу отправлять сообщения и находить пользователей в чатах по вашему запросу. Также цитировать статьи в новостях и делать покупки за вас в вконтакте PAY");
   utterThis.lang = 'ru-RU';

  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "Я могу отправлять сообщения и находить пользователей в чатах по вашему запросу. Также цитировать статьи в новостях и делать покупки за вас в вконтакте PAY";
          }else if(result[0].transcript.indexOf('Спасибо') >= 0){
                var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("Пустики. Я была создана для того что бы помочь тебе");
   utterThis.lang = 'ru-RU';

  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "Пустики. Я была создана для того что бы помочь тебе";
          }else if(result[0].transcript.indexOf('Привет') >= 0){
                var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("Иди нахуй пидорас сука ебаная");
   utterThis.lang = 'ru-RU';

  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "Пустики. Я была создана для того что бы помочь тебе";
          }else{
            var synth = window.speechSynthesis;
   var utterThis = new SpeechSynthesisUtterance("я не совсем поняла что вы имели ввиду. Простите меня. Пожалуста повтори что ты сказал");
   utterThis.lang = 'ru-RU';

  synth.speak(utterThis);
  document.getElementById("text").innerHTML = "я не совсем поняла что вы имели ввиду. Простите меня. Пожалуста повтори что ты сказал";
          }
      };




//ENE END
      recognition.onend = function() {
        console.log('Распознавание завершилось.');
      };

      recognition.start();
    } else alert('webkitSpeechRecognition не поддерживается :(')
  }
  startRecognizer();
</script>
