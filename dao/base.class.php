<?php

/* Autor Alisson Prado  
 * Objetivo: Manipulação dinamica de criação de tabelas
 * Data: 20/12/2019
 */
require_once ('banco.class.php');
abstract class base extends banco{
    
    //Propriedades
    public $tabela = "";
    public $campos_valores = array();
    public $campospk = NULL;
    public $valorpk = NULL;
    public $extras_select = "";
    
    //Métodos
    public function addCampo($campo = NULL, $valor= NULL){
        if($campo != NULL):
        $this->campos_valores[$campo] = $valor;
        endif;
    }//Add Campo
    public function delCampo($campo){
        if(array_key_exists($campo, $this->campos_valores)):
            unset($this->campos_valores[$campo]);
        endif;
    }//Deletar Campo
    public function setValor($campo = NULL, $valor = NULL){
        if($campo!=NULL && $valor!=NULL):
        $this->campos_valores[$campo] = $valor;
        endif;
    }//Set Valor
    public function getvalor($campo=NULL){
        if($campo!= NULL && array_key_exists($campo, $this->campos_valores)):
            return $this->campos_valores[$campo];
        else:
            return FALSE;
        endif;
    }//Get Valor
}//Fim da Base

?>
