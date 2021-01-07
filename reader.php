<?php
    $title = htmlspecialchars($_POST['title']); //holds text title
    $wpm = htmlspecialchars($_POST['wpm']); //holds words per minute
    $text = htmlspecialchars($_POST['text']);
    $words = explode(' ', $text); //(array) holds each word of text
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Word Reader</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <a id="return-arrow" href="index.php">
                <img src="chevron-left.png">
                <h3>Change Text</h3>
            </a>
            <h3 id="current-title"> 
                <?php if(isset($title) && $title != '') {
                    echo 'Currently Reading: ' . $title;
                }
                ?>
            </h3>
            <h3 id="current-wpm">Current WPM: 
                <?php if(isset($wpm)) {
                    echo $wpm;
                }
                if($wpm == 700) {
                    echo ' (You can read this fast?)';
                }
                ?>
            </h3>
        </div>
    </header>
    <div id="word-container" class="container">
        <h1 id="word"></h1>
    </div>
    <script>
        //functions to handle timer
        function getMillisecondDelay(wpm) {
            wps = wpm / 60;
            ms = (1 / wps) * 1000;
            return ms;
        }
        function displayWord(words, currentWord) {
            let h1 = document.getElementById('word');
            if(words[currentWord] == undefined) {
                h1.innerHTML = "The End!";
            }else {
                h1.innerHTML = words[currentWord];    
            }
        }
        function startTimer(currentWord) {
            setInterval(function() {
                displayWord(words, currentWord);  
                currentWord++; 
            }, ms)
        }
        
        //convert all needed data into JS
        wpm = <?php echo json_encode($wpm); ?>;
        words = <?php echo json_encode($words); ?>;
        ms = getMillisecondDelay(wpm);
        let currentWord = 0;

        startTimer(currentWord); //start timer 
    </script>
</body>
</html>