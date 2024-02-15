<?php
/**
 * Description of Transaxion
 */
class Transaxion {
    /**
     * @param PDO $pdo
     */
    public function initialiser(PDO &$pdo) {
        $OK = true;
        try {
            $pdo->beginTransaction();
        } catch (PDOException $e) {
            $OK = false;
        }
        return $OK;
    }
    /**
     *
     * @param PDO $pdo
     */
    public function valider(PDO &$pdo) {
        $OK = true;
        try {
            $pdo->commit();
        } catch (PDOException $e) {
            $OK = false;
        }
        return $OK;
    }

    /**
     *
     * @param PDO $pdo
     */
    public function annuler(PDO &$pdo) {
        $OK = true;
        try {
            $pdo->rollback();
        } catch (PDOException $e) {
            $OK = false;
        }
        return $OK;
    }
}
?>