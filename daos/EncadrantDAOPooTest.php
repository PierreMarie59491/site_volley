<?php

/*
 * http://localhost\site_volley\daos\EncadrantDAOPooTest.php
 */

declare(strict_types=1);

require_once '../models/Encadrant.php';
require_once '../models/Connexion.php';
require_once './EncadrantDAOPoo.php';
// require_once './Transaxion.php';

try {
    // Connexion à la BD
    $cnx = new Connexion();
    // $tx = new Transaxion();

    $pdo = $cnx->seConnecter("../conf/projetPersoVolley.ini");
    // $tx->initialiser($pdo);

    $Encadrant = new Encadrant(10, "Doe", "John",366455);
    // Instanciation du DAO
    $dao = new EncadrantDAOPoo($pdo);

    /*
    * DELETE
    */

    //     echo "<hr>DELETE<br>";
    //     $tx->initialiser($pdo);
    //     $Encadrant->setIdEncadrant(3);
    //     $Encadrant->setNomEncadrant("Caen");
    //     $affected = $dao->delete($Encadrant);
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
    //     $Encadrant->setIdEncadrant(1);
    //     $Encadrant->setNomEncadrant("Caen");
    //     $Encadrant->setCp("14000");
    //     $affected = $dao->update($Encadrant);
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
    $resultat = $dao->selectOne(1);
    // var_dump($resultat);
    echo "<br>" . $resultat->getIdEncadrant() ;
    echo "<br>" . $resultat->getPrenomEncadrant();
    echo "<br>" . $resultat->getNomEncadrant();
    echo "<br>" . $resultat->getNumLicence();

    echo "Encadrant ". $resultat->getIdEncadrant() . ": " . $resultat->getPrenomEncadrant() . " " . $resultat->getNomEncadrant() . "<br>";
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
//         echo $objet->getIdEncadrant() . 
//         ":" . $objet->getNomEncadrant() . ":" . $objet->getPrenomEncadrant() . "<br>";
// }
// } catch (PDOException $exc) {
//     echo $exc->getMessage();
// }
