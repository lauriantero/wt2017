
<!doctype html>
<html lang="en">
  <head>
    <title>Movies/Series Tracker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Movie/Series Tacker</a>
            </div>


            <form class="navbar-form navbar-right" role="search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#register">Register</a></li>
              <li><a href="#login">Login</a></li>
            </ul>

            <div class="collapse navbar-collapse navbar-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="#home">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#movies">Movies
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#top_rated">Top rated</a></li>
                    <li><a href="#most_recent">Most Recent</a></li>
                    <li><a href="#top_reviews">Top reviews</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#series">Series
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#top_rated">Top rated</a></li>
                    <li><a href="#most_recent">Most Recent</a></li>
                    <li><a href="#top_reviews">Top reviews</a></li>
                  </ul>
                </li>
              </ul>

            </div>
        </div>
    </nav>


    <div class="card-group">
      <div class="card">
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->
        <div class="card-block">
          <h4 class="card-title">Movies</h4>
          <p class="card-text">
              <?php
                include 'connection.php';
                $sql = "SELECT id, name, year FROM items";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Year: " . $row["year"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
      <div class="card">
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->
        <div class="card-block">
          <h4 class="card-title">Series</h4>
          <p class="card-text">
              <?php
                include 'connection.php';
                $sql = "SELECT id, name, year FROM items";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Year: " . $row["year"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $db->close();
            ?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 20 mins ago</small>
        </div>
      </div>
    </div>

    <script type="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Optional JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>