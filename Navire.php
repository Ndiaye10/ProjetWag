<?php

class   Navire
{
    public $ordre;
    public $etat_navire;
    public $munissions;
    public $sante;
    public $nbr_navir

    public function __construct($nbr_navir)
    {
        $this->nbr_navir = $nbr_navir;
    }

    //Nous donnera une information sur le nombre des munissions restantes
    public bool estVide()
    {
        if($this->munissions == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //Cette méthode diminuera le nombre des navires au fur et à mesure de la bataille

    function perte_navir()
    {
        return $this->nbr_navir -= 1; 
    }

    //Nous donnera le nombre actuel des navir restant
    function get_navir()
    {
        return $this->nbr_navir; 
    }



    //Définition de la classe fille Navir soutiens

    class   navire_Soutien extends Navire
    {
        public $ravitaillement_Carburant;
        public $assistance_Mecanique;
        public $cargaison;

        public function __construct( $ravitaillement_Carburant, $assistance_Mecanique, $cargaison)
        {
            $this->ravitaillement_Carburant = $ravitaillement_Carburant;
            $this->assistance_Mecanique = $assistance_Mecanique;
            $this->cargaison = $cargaison;
        }

        //Pour nous permettre de nous ravitailler
        function set_ravitaillement_Carburant( $carburant )
        {
            $this->Carburant = $Carburant;
        }

        function set_assistance_Mecanique( $arme )
        {
            $this->arme = $arme;
        }

        function set_cargaison( $cargaison )
        {
            $this->cargaison = $cargaison;
        }

        //Pour nous donner l'état actuel des composants

        function get_ravitaillement_Carburant()
        {
            return $this->Carburant;
        }

        function get_assistance_Mecanique()
        {
            return $this->arme;
        }

        function get_cargaison()
        {
            return $this->cargaison;
        }



    }
    
    //Définition de la classe fille Navir offensifs

    class   navire_offensifs extends Navire
    {
        public $cuirassés;
        public $croisseurs;
        public $destroyers;

        public function __construct( $cuirassés, $croisseurs, $destroyers)
        {
            $this->cuirassés = $cuirassés;
            $this->croisseurs = $croisseurs;
            $this->destroyers = $destroyers;
        }


        function get_attaquer()
        {
            return $this->ordre;
        }

        function tirer()
        {
            return $this->munissions -= 1; 
        }

        function set_augmenter_bouclier($sante)
        {
            $this->sante = $sante + 1;
        }

    }

    $base_navire = new Navire(50);
    $N_offensifs = new navire_offensifs(24,6,12);
    $N_soutiens = new navire_Soutien(...,...,...);


    $base_navire->$N_offensifs->tirer();



}





?>