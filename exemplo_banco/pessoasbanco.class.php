<?php 
/*Criar a classe PESSOAS_BANCO (tds2023/exemplo_banco/pessoasbanco.class.php) */

include "conexao.class.php";
class Pessoas_banco {
    //criar gettes e setters

    private $ID_Pessoa;
    private $nome;
    private $email;
    private $idade;
    //pegando os dados
    function setId_Pessoa($ID_Pessoa) {
        $this->ID_Pessoa = $ID_Pessoa;
    }
    function getId_Pessoa() {
        return $this->ID_Pessoa;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    function getNome() {
        return $this->nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function getEmail() {
        return $this->email;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }
    function getIdade() {
        return $this->idade;
    }

    function listaPessoas() {
        $database = new Conexao(); //nova instancia da conexao
        $db = $database->getConnection(); //tenta conectar

        $sql = "Select * from pessoa";

        try {
            $stmt = $db->query($sql);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC); //rs = result -> resultado  ::::: fetchAll == ecncapsula realizando o processo concatenativo em todos os itens/objetos presentes no ambiente
            return $rs;
        } catch(PDOExeption $e) {
            echo 'Erro ao listar pessoas: ' . $e->getMessage();
            $rs = [];
            return $rs;
        }
    }
    
    function deletarPessoa() {
        $database = new Conexao(); //nova instancia da conexao
        $db = $database->getConnection(); //tenta conectar

        $sql = "DELETE FROM pessoa WHERE ID_Pessoa =:ID_Pessoa";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':ID_Pessoa', $this->ID_Pessoa);
            $stmt->execute();
        } catch(PDOExeption $e) {
            echo "Erro ao deletar pessoa: " . $e->getMessage();
        }
    }
    function inserirPessoa() {
        $database = new Conexao(); //nova instancia da conexao
        $db = $database->getConnection(); //tenta conectar
        
        $sql = "INSERT INTO pessoa (nome, email, idade) VALUES (:nome, :email, :idade)";
        try {
            $stmt = $db->prepare($sql);

            
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->execute();
            return true;
        } catch(PDOExeption $e) { //if(erro==true) {echo $this->mensagem;}
            echo "Erro ao inserir pessoa: " . $e->getMessage();
            return false;
        }
    echo "ok";
    }
}
    
?>