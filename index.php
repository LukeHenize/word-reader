<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Word Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 id="title">The Word Reader</h1>
        <h2 id="author"></h2>
        <p id="project-info"></p>
    </div>

    <div class="container">
        <form id="text-settings" method="post" 
        action="reader.php" autocomplete="off">
            <div>
                <label>Book Title</label><br>
                <input type="text" name="title">
            </div><hr>
            <div>
                <label>Words Per Minute (100-700)</label><br>
                <input type="number" name="wpm" 
                min="100" max="700" value="500">
            </div><hr>
            <div>
                <label>Text</label>
                <p></p>
                <textarea name="text"></textarea><br>
                <input id="submit" type="submit" value="Start Reading">
            </div> 
            
        </form>
    </div>

</body>
</html>