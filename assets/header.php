<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Datenbank Controller</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="<?php if($_SERVER['REQUEST_URI'] == "/"){echo "active";}?>"><a href="/">Home</a></li>
      <li class="<?php if($_SERVER['REQUEST_URI'] == "/person.php"){echo "active";}?>"><a href="/person.php">Personen</a></li>
      <li class="<?php if($_SERVER['REQUEST_URI'] == "/projekt.php"){echo "active";}?>"><a href="/projekt.php">Projekte</a></li>
      <li class="<?php if($_SERVER['REQUEST_URI'] == "/einstellungen.php"){echo "active";}?>"><a href="/einstellungen.php">Einstellungen</a></li>
    </ul>
  </div>
</nav>
