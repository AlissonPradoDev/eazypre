<?php

/* @author Alisson Prado Online */
//define('HOSTNAME', 'localhost');
//define('USERNAME', 'root');
//define('PASSOWORD', '');
//define('DATABASE', 'educa341_iea2020');
//define('CHARSET', 'utf8');

//    
    /*@author Alisson Prado OffLine*/
    define('HOSTNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSOWORD', '');
    define('DATABASE', 'precadastro');
    define('CHARSET', 'utf8');

abstract class banco {

//    //Propriedades Online
//    public $servidor = "localhost";
//    public $usuario = "####";
//    public $senha = "####%";
//    public $nomebanco = "####";
//    public $conexao = NULL;
//    public $dataset = NULL;
//    public $linhasafetadas = -1;

//// Propriedades Offline
//     public $servidor = "localhost";
//     public $usuario = "root";
//     public $senha = "";
//     public $nomebanco = "saltmais";
//     public $conexao = NULL;
//     public $dataset = NULL;
//     public $linhasafetadas = -1;
    //Metodo
    public function __construct() {
        $this->conecta();
    }

    //Construtor
    public function __destruct() {
        if ($this->conexao != NULL):
            mysqli_close($this->conexao);
        endif;
    }

    public function conecta() {
        $this->conexao = mysqli_connect(HOSTNAME, USERNAME, PASSOWORD, DATABASE)or die("Erro de MySQL");
        mysqli_set_charset($this->conexao, "utf8") or die(mysqli_error($this->conexao));
        return $this->conexao;
    }

    public function inserir($objeto) {
        //insert into nome da tabela (campo1, campo2) values (valor1, valor2)
        $sql = "INSERT INTO " . $objeto->tabela . " (";
        for ($i = 0; $i < count($objeto->campos_valores); $i++):
            $sql .= key($objeto->campos_valores);
            next($objeto->campos_valores);
            if ($i < (count($objeto->campos_valores) - 1)):
                $sql .= ", ";
            else :
                $sql .= ") ";
            endif;
        endfor;
        reset($objeto->campos_valores);
        $sql .= "VALUES (";
        for ($i = 0; $i < count($objeto->campos_valores); $i++):
            $sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ?
                    $objeto->campos_valores[key($objeto->campos_valores)] :
                    "'" . $objeto->campos_valores[key($objeto->campos_valores)] . "'";
            next($objeto->campos_valores);
            if ($i < (count($objeto->campos_valores) - 1)):
                $sql .= ", ";
            else :
                $sql .= ") ";
            endif;
        endfor;

        return $this->executaSQL($sql);
    }

//Inserir
    public function atualizar($objeto) {
        //UPDATE  nome da tabela SET campo1=valor1, campo2=valor2 WHERE campochave=valorchave
        $sql = "UPDATE  " . $objeto->tabela . " SET ";
        for ($i = 0; $i < count($objeto->campos_valores); $i++):
            $sql .= key($objeto->campos_valores) . "=";
            $sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ?
                    $objeto->campos_valores[key($objeto->campos_valores)] :
                    "'" . $objeto->campos_valores[key($objeto->campos_valores)] . "'";

            if ($i < (count($objeto->campos_valores) - 1)):
                $sql .= ", ";
            else :
                $sql .= " ";
            endif;
            next($objeto->campos_valores);
        endfor;
        $sql .= " WHERE " . $objeto->campospk . "=";
        $sql .= is_numeric($objeto->valorpk) ? $objeto->valorpk : "'" . $objeto->valorpk . "'";

        return $this->executaSQL($sql);
    }

//Atualizar
    public function deletar($objeto) {
        //DELETE FROM tabela where campopk = valorpk
        $sql = "DELETE FROM " . $objeto->tabela;
        $sql .= " WHERE  " . $objeto->campospk . "=";
        $sql .= is_numeric($objeto->valorpk) ? $objeto->valorpk : "'" . $objeto->valorpk . "'";
        return $this->executaSQL($sql);
    }

    public function selecionaTudo($objeto) {
        $sql = "SELECT * FROM  " . $objeto->tabela;
        if ($objeto->extras_select != NULL):
            $sql .= " " . $objeto->extras_select;
        endif;
        return $this->executaSQL($sql);
    }

//SelecionaCampo
    public function selecionaCampos($objeto) {
        $sql = "SELECT ";
        for ($i = 0; $i < count($objeto->campos_valores); $i++):
            $sql .= key($objeto->campos_valores);
            next($objeto->campos_valores);
            if ($i < (count($objeto->campos_valores) - 1)):
                $sql .= ", ";
            else :
                $sql .= " ";
            endif;
        endfor;

        $sql .= " FROM  " . $objeto->tabela;
        if ($objeto->extras_select != NULL):
            $sql .= " " . $objeto->extras_select;
        endif;
        return $this->executaSQL($sql);
    }

//Executa a Query

    public function executaSQL($sql = NULL) {
        if ($sql != NULL):
            $query = mysqli_query($this->conexao, $sql) or $this->trataerro(__FILE__, __FUNCTION__);
            $this->linhasafetadas = mysqli_affected_rows($this->conexao);
            if (substr(trim(strtolower($sql)), 0, 6) == 'select'):
                $this->dataset = $query;
                return $query;
            else:
                return $this->linhasafetadas;
            endif;
        else:
            $this->trataerro(__FILE__, __FUNCTION__, NULL, 'Comando SQL não informado', FALSE);
        endif;
    }

    public function retornadados($tipo = NULL) {
        switch (strtolower($tipo)):
            case "array":
                return mysqli_fetch_array($this->dataset);
                break;

            case "assoc":
                return mysqli_fetch_assoc($this->dataset);
                break;

            case "object":
                return mysqli_fetch_object($this->dataset);
                break;

            default:
                return mysqli_fetch_array($this->dataset);
                break;
        endswitch;
    }

    public function trataerro($arquivo = NULL, $rotina = NULL, $numerro = NULL, $msgerro = NULL, $geraexcept = FALSE) {
        if ($arquivo == NULL)
            $arquivo = 'Arquivo nao informado';
        if ($rotina == NULL)
            $rotina = "Rotina nao informada";
        if ($numerro == NULL)
            $numerro = mysqli_errno($this->conexao);
        if ($msgerro == NULL)
            $msgerro = mysqli_error($this->conexao);
        $resultado = 'Ocorreu um erro nos seguintes detalhes:<br/>
                     <strong>Arquivo: </strong>' . $arquivo . '<br/>
                     <strong>Rotina:  </strong>' . $rotina . '<br/>
                     <strong>Código:  </strong>' . $numerro . '<br/>
                     <strong>Mensagem:</strong>' . $msgerro . '
                    ';
        if ($geraexcept == FALSE):
            echo $resultado;
        else :
            die($resultado);
        endif;
    }

//tratamento
}

//Fim da Classe Banco
?>
