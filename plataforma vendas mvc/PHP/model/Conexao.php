<?php

    class conexao{
        private $host;
        private $usuario;
        private $senha;
        private $nomeBanco;

        // Construtor da Classe
        // É um método que utilizamos para inicializar a classe.
        // Sempre tem o mesmo nome da classe, e não possui e retorno,  e também é void.
        // Chamamos um construtor quando instanciamos a classe, através do new.

        public function __construct($host = "localhost", 
             $usuario = "root",
             $senha = "",
            $nomeBanco = "autopecas_tanaka" 
        ){
            $this->$host  = $host;
            $this->$usuario  = $usuario;
            $this->$senha  = $senha;
             $this->$nomeBanco  = $nomeBanco;

             $this->connect();
        }

        public function connect() {

            try{

                //criar um novo objeto que conecta no banco de dados
                // vamos utilizar o PDO para isso, passando as variáveis (construtor) acima como parametro.
                 $dsn = "mysql:host{$this->host};dbname={$this->nomeBanco};charset=utf8";
                $this->conn = new PDO ($dsn, this->usuario, this->senha);

                //Define como o PDO vai tratar o erro
                // No caso, vai lançar uma exceção, que posteriormente será tratada no CACTH
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //conecta no banco
                return $this->conn;
                
            }catch(PDOException $e){
                die("Erro ao conectar com o banco de dados " . $e->getMessage());
            }

        }

    }

?>