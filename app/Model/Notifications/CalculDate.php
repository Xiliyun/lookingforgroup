<?php
Namespace Model\Notifications;

class CalculDate
{
    
    private $_now;
    
    /**
     * Récupération de la date du jour
     */
    public function __construct() {        
        $this->_now = time();
    }
    
    /**
     * Calcul de la période écoulée entre aujourd'hui et la date passée en paramètre
     * @param DateTime $date
     * @return string Période Ecoulé depuis aujourd'hui.
     */
    public function calcul($date){
        
        $date = new \DateTime($date, new \DateTimeZone('Europe/Paris'));
        $date2 = $date->getTimestamp();
        
        $diff = abs($this->_now - $date2);
        $retour = array();
    
        $tmp = $diff;

        $minutes = '';
        $heure = '';
        $jour = '';


        $retour['second'] = $tmp % 60;
    
        $tmp = floor( ($tmp - $retour['second']) /60 );
        $retour['minute'] = $tmp % 60;
        if($retour['minute'] == 1) {
            $minutes = $retour['minute'].' minute.';
        } else if ($retour['minute'] > 1) {
            $minutes = $retour['minute'].' minutes.';
        }

    
        $tmp = floor( ($tmp - $retour['minute'])/60 );
        $retour['hour'] = $tmp % 24;
        if($retour['hour'] == 1) {
            $heure = $retour['hour'].' heure.';
        } else if ($retour['hour'] > 1) {
            $heure = $retour['hour'].' heures et ';
        }
    
        $tmp = floor( ($tmp - $retour['hour'])  /24 );
        $retour['day'] = $tmp;
        if($retour['day'] == 1) {
            $jour = $retour['day'].' jour.';
        } else if ($retour['day'] > 1) {
            $jour = $retour['day'].' jours ';
        }
    
        if($retour['minute'] == 0) {
            $phrase = "A l'instant";
        } else {
            $phrase = $jour.''.$heure.''.$minutes;
        }
    
        return $phrase;
    }
}

