<?php include_once 'header.php'; ?>

<!-- Hero -->
<div class="col-3" id="center">
    <?php
      if (isset($_GET["error"])) {
          if ($_GET["error"] == "userdeleted") {
              echo "<h2 text-align: center'>Ihr Konto wurde erfolgreich gelöscht.</h2><br>";
          }
          elseif ($_GET["error"] == "notloggedin") {
              echo "<h2 style='color: red; text-align: center'>Sie müssen sich einloggen um ihren Warenborb anzusehen</h2><br>";
          }
      }

     ?>
</div>
<div class="hero" id="yellow">
            <div class="container">
                <div class="row">
                    <div class="col-2">

                        <?php
                            if (isset($_SESSION["vorname"])) {
                                echo "<h1>Hallo " . $_SESSION["vorname"] . ", probiere jetzt unsere neuen Sorten!</h1>";
                            }
                            else {
                                echo "<h1>Probiere jetzt unsere neuen Sorten!</h1>";
                            }
                        ?>
                        <p>In Zusammenarbeit mit lokalen Röstereien haben wir drei neue geschmackvolle und einzigartige Sorten kreiert.</p>
                        <a href="products.php"><button class="btn">Erfahre mehr &#8594;</button></a>
                    </div>
                    <div class="col-2">
                        <a href="products.html"><img src="../images/hero_1.png" alt="hero1"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sub Banner -->
        <div class="sub-banner">
            <div class="row">
                <div class="col-3" id="right">
                    <p>In Deutschland geröstet <img src="../images/sun.png" alt="Sun" style="height: 20px; width: 20px;"></p>
                </div>
                <div class="col-3" id="center">
                    <div class="row">
                        <div class="col-mini-3" id="right">
                            <p>4.8</p>
                        </div>
                        <div class="col-mini-3">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                        <div class="col-mini-3" id="left">
                            <p>10.547 Bewertungen</p>
                        </div>
                    </div>
                </div>
                <div class="col-3" id="left">
                    <p>USDA Organic-Zertifiziert <img src="../images/leaf.png" alt="Leaf" style="height: 20px; width: 20px;"></p>
                </div>
            </div>
        </div>

            <hr style="width: 1200px; margin: auto; margin-bottom: 50px;">

            <!-- Inforamtion -->
            <div class="small-container">
                <div class="main-info">
                    <p>Du bist, was du trinkst</p>
                    <h2>So stellen wir sicher, dass jede Tasse Kaffee, die ihr genießen wollt, auf die nachhaltigste und fairste Weise für euch angepflanzt, geerntet und zu euch geliefert wurde.</h2>
                </div>
                <div class="main-info-grid">
                    <div class="row">
                        <div class="col-3">
                            <h4>Unterstützung von Gemeinschaften</h4>
                            <p>Guter Kaffee, guter Grund. Wir arbeiten mit Food4Farmers zusammen um eine langlebige Sicherstellung von Nahrung für Familien in der Kaffeegemeinschaft sicherzustellen.</p>
                        </div>
                        <div class="col-3">
                            <h4>Fair produziert</h4>
                            <p>All unsere Produkte werden frisch auf einer deutschen Farm geröstet und verarbeitet, die besten Standards und Arbeitsverhältnisse gewährleistet.</p>
                        </div>
                        <div class="col-3">
                            <h4>Nachhaltig geschöpft</h4>
                            <p>Wir gehen sehr achtsam mit unseren Ressourcen um und belegen unsere ökologische Nachhaltigkeit mit dem USDA Zertifikat.</p>
                        </div>
                    </div>
                </div>
                <hr style="width: 1200px; margin: auto; margin-bottom: 50px;">
            </div>

            <!-- Offer -->
            <div class="offer">
                <div class="small-container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../images/hero_2.png" alt="hero_2" class="offer-img">
                        </div>
                        <div class="col-2">
                            <p>Jetzt nichts mehr verpassen.</p>
                            <h1>FOMO?</h1>
                            <small>Du willst auch den leckersten Kaffee aus dem wunderschönen Deutschland probieren? Dann warte nicht lange ab und tauche ein in die Welt von Student Coffee! Für jeden Geschmack gibt es die passende Röstung. Probiere es aus!</small>
                            <br>
                            <a href="products.php" class="btn">Buy Now &#8594;</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

<?php include_once 'footer.php'; ?>
