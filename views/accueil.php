<!DOCTYPE html>

<head>
    <title>Site La Madeleine volley</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="../icons/iconeaccueil.png" />

    <link rel="stylesheet" href="../css/lmvbvastyle.css" />
    <style>
    </style>
</head>

<body>

    <header>
        <?php
        include "header.php";
        ?>
    </header>

    <nav class="nav">
        <?php
        include "nav.php";
        ?>
    </nav>

    <main class="maincore">
        <section>
            <p>Actualités</p>
            <nav>
                <input id="btPremiere" type="button" value="|<<" />
                <input id="btPrecedente" type="button" value="<<" />
                <input id="btPlayStop" type="button" class="btBlack" value="Play" />
                <input id="btSuivante" type="button" value=">>" />
                <input id="btDerniere" type="button" value=">>|" />
            </nav>

            <section id="carousel">
                <img id="photo" src="../images/actualites/0.jpg" alt="photo" width="800vw" height="450vh" /><br>
                <label id="lblMessage">Message</label>

            </section>

            <script src="../js/accueil.js">
            </script>

        </section>
      
            <div id="Liens">
                <h2>Liens externes</h2>
            
            <ul>
                <li>
                    <a href="https://www.ffvbbeach.org/ffvbapp/resu/vbspo_home.php?codent=LIFL">Championnats Régionaux</a>
                </li>
                <li>
                    <a href="https://www.ffvbbeach.org/ffvbapp/resu/vbspo_home.php?codent=PTFL59">Championnats Départementaux</a>
                </li>
            </ul>
            </div>
        </section>

    </main>

    <footer>
        <?php
        include "footer.php";
        ?>
    </footer>
    </main>
</body>