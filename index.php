<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player ni Espinosa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include("./config.php");
    $query = "SELECT *  FROM songs";
    $result = mysqli_query($conn, $query);
    $songs = array();
    ?>
    <main>

        <header>
            <h1>Music Lists</h1>
        </header>
        <form class="top-bar" action="./index.php" method="get">
            <div>
                <label for="searchBy">Search by:</label>
                <select name="searchBy" id="searchBy">
                    <option value="name">Name</option>
                    <option value="genre">Genre</option>
                    <option value="artist">Artist</option>
                    <option value="year">Year</option>
                </select>
            </div>
            <div>
                <input type="text" name="search" id="search">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="content-box">

            <div class="content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Album</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Artist</th>
                            <th scope="col">Year Released</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['search']) && isset($_GET['searchBy'])) {
                            $search = $_GET['search'];
                            $searchBy = $_GET['searchBy'];
                            $query = "SELECT * FROM songs WHERE $searchBy LIKE '%$search%'";
                            $result = mysqli_query($conn, $query);
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                            $songs[] = $row;
                            echo "<tr>";
                            echo "<th scope='row'>{$row['id']}</th>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['album']}</td>";
                            echo "<td>{$row['genre']}</td>";
                            echo "<td>{$row['artist']}</td>";
                            echo "<td>{$row['year']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bottom-form">

            <div class="add">
                <h4>
                    Add new
                </h4>
                <form action="./add.php" method="post">
                    <div>
                        <label for="name">Song Name</label>
                        <input type="text" name="name" require>
                    </div>

                    <div>
                        <label for="album">Album</label>
                        <input type="text" name="album" require>
                    </div>

                    <div>
                        <label for="genre">Genre</label>
                        <input type="text" name="genre" require>
                    </div>

                    <div>
                        <label for="artist">Artist</label>
                        <input type="text" name="artist" require>
                    </div>

                    <div>
                        <label for="year">Year Released</label>
                        <input type="text" name="year" require>
                    </div>

                    <button type="submit" class="btn btn-success"> Add Song</button>

                </form>
            </div>

            <div class="edit">
                <form class="" action="./edit.php" method="get">

                    <h4>
                        Edit a song
                    </h4>
                    <div>
                        <label for="song_id">Select Song:</label>
                        <select name="song_id" id="song_id">
                            <?php

                            foreach ($songs as $song) {
                                echo "<option value=\"{$song['id']}\">{$song['id']}: {$song['name']}</option>";
                            }


                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Edit Song
                    </button>
                </form>
            </div>

            <div class="delete">
                <form class="" action="./delete.php" method="post">

                    <h4>
                        Delete a song
                    </h4>
                    <div>
                        <label for="song_id">Select Song:</label>
                        <select name="song_id" id="song_id">
                            <?php

                            foreach ($songs as $song) {
                                echo "<option value=\"{$song['id']}\">{$song['id']}: {$song['name']}</option>";
                            }


                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">
                        Delete Song
                    </button>
                </form>
            </div>

        </div>
    </main>
</body>

</html>