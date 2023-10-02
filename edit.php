<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit song</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="bottom-form">
            <div class="edit">
                <?php
                include("./config.php");
                $id = $_GET['song_id'];
                $query = "SELECT * FROM songs WHERE id='$id'";
                $result = mysqli_query($conn, $query);
                $song = mysqli_fetch_assoc($result);

                $id = $song['id'];
                $name = $song['name'];
                $album = $song['album'];
                $genre = $song['genre'];
                $artist = $song['artist'];
                $year = $song['year'];
                
                ?>
                <form action="./update.php" method="post">
                    <h4>
                        Edit Song <?php echo "$id" ?> :
                    </h4>

                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div>
                        <label for="name">Song Name</label>
                        <input type="text" name="name" value="<?php echo "$name" ?>">
                    </div>

                    <div>
                        <label for="album">Album</label>
                        <input 
                        type="text" 
                        name="album"
                        value="<?php echo "$album" ?>"
                        >
                    </div>

                    <div>
                        <label for="genre">Genre</label>
                        <input type="text" name="genre"
                        value="<?php echo "$genre" ?>"
                        >
                    </div>
                    
                    <div>
                        <label for="artist">Artist</label>
                        <input type="text" name="artist"
                        value="<?php echo "$artist" ?>"
                        >
                    </div>

                    <div>
                        <label for="year">Year Released</label>
                        <input type="text" name="year"
                        value="<?php echo "$year" ?>"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary"> Update Song</button>

                </form>            
            </div>
        </div>
    </main>
</body>
</html>