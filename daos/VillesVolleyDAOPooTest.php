<?php

/*
 * http://localhost\site_volley\daos\VillesVolleyDAOPooTest.php
 */

declare(strict_types=1);

require_once '../models/Villes.php';
require_once '../models/Connexion.php';
require_once './VillesVolleyDAOPoo.php';
// require_once './Transaxion.php';

try {
    // Connexion à la BD
    $cnx = new Connexion();
    // $tx = new Transaxion();

    $pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
    // $tx->initialiser($pdo);

    $villes = new Villes(1, "14000", "Caen");
    // Instanciation du DAO
    $dao = new VillesDAOPoo($pdo);


    //     // Instantiation de la ville
    //     $villes = new Villes(14000, "Caen", "www.caen.fr", "caen.jpg", 033);
    //     // Instantiation du DAO
    //     $dao = new VillesDAOPoo($pdo);

    //     // Excécuton de la méthode insert()
    //     $affected = $dao->insert($villes);

    //     echo "Nombre de lignes affectées = " .  $affected;
    // } catch (PDOException $exc) {
    //     echo $exc->getMessage();


    /*
    * DELETE
    */

    //     echo "<hr>DELETE<br>";
    //     $tx->initialiser($pdo);
    //     $villes->setIdVilles(3);
    //     $villes->setNomVille("Caen");
    //     $affected = $dao->delete($villes);
    //     echo "Delete ? $affected<br>";
    //     if ($affected == 1) {
    //         $OK = $tx->valider($pdo);
    //         if ($OK) {
    //             echo "Commit DELETE OK<br>";
    //         } else {
    //             echo "Commit DELETE KO<br>";
    //         }
    //     } else {
    //         if ($affected != 0) {
    //             $OK = $tx->annuler($pdo);
    //             echo "Rollback ? $OK";
    //         }
    //     }
    // } catch (PDOException $exc) {
    //     echo $exc->getMessage();

    //     echo "<hr>UPDATE<br>";
    //     // $tx->initialiser($pdo);
    //     $villes->setIdVille(1);
    //     $villes->setNomVille("Caen");
    //     $villes->setCp("14000");
    //     $affected = $dao->update($villes);
    //     echo "Update ? $affected<br>";
    //     if ($affected == 1) {
    //         // $OK = $tx->valider($pdo);
    //         if ($OK) {
    //             echo "Commit UPDATE OK<br>";
    //         } else {
    //             echo "Commit UPDATE KO<br>";
    //         }
    //     } else {
    //         if ($affected != 0) {
    //             // $OK = $tx->annuler($pdo);
    //             echo "Rollback ? $OK";
    //         }
    //     }
    // } catch (PDOException $exc) {
    //     echo $exc->getMessage();
    // }

    /*
 * SELECT ONE
 */
    echo "<hr>SELECT ONE<br>";
    $resultat = $dao->selectOne(2);
    var_dump($resultat);
    echo "<br>" . $resultat->getIdVille() ;
    echo "<br>" . $resultat->getCp();
    echo "<br>" . $resultat->getNomVille();

    // echo "Ville : " . $resultat->getNomVille() . ", Code postal : " . $resultat->getCp() . "<br>";
    // var_dump ($resultat) ;
    
    }  catch (PDOException $exc) {
    echo $exc->getMessage();
    }
    /*
     * SELECT ALL
     */
//     echo "<hr>SELECT ALL<br>";
//     $t = $dao->selectAll();
//     foreach ($t as $objet) {
//         echo $objet->getIdPays() . ":" . $objet->getNomPays() . "<br>";
// } catch (PDOException $exc) {
//     echo $exc->getMessage();
// }
//}