
<script>
    var x = document.getElementById("Audio");
    function playAudio()
    {
        x.play();
    }

    function gamesound(audioFile)
    {
        var audio = document.getElementById("Sound");
        var image = document.getElementById('img');
        if(!audio.src)
            audio.src = audioFile;
        if(audio.paused == false)
        {
            audio.pause();
            image.src = "images/mute.png";
        }
        else
        {
            image.src = "images/sound.png";
            audio.play();
        }
    }
</script>

</body>
</html>