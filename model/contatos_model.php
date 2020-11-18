<?php
//require_once ("./dao/base.class.php"); Online
require_once ("../dao/base.class.php");

class contatos extends base {
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "contatos";
        if (is_array($campos) && sizeof($campos)):
        $this->campos_valores = array(
          "ctt_pnome" => NULL, 
          "ctt_unome" => NULL, 
          "ctt_email" => NULL,
          "ctt_cpf" => NULL,
          "ctt_mae" => NULL,
          "ctt_pai" => NULL,
          "ctt_dt_nasc" => NULL,
          "ctt_status" => NULL
        );
        else:
        $this->campos_valores = $campos;
        endif;
        $this->campospk = "idcontatos";
    }
}
?>
