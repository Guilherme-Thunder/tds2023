<?php
    include "pessoasbanco.class.php";
    function alterarPessoa() {
        $database = new Conexao(); //nova instancia da conexao
        $db = $database->getConnection(); //tenta conectar

        $sql = "UPDATE pessoa SET nome=:nome; idade=:idade; email=:email; ";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':ID_Pessoa', $this->ID_Pessoa);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        } catch(PDOExeption $e) {
            echo "Erro ao upar novas mudanças na pessoa: " . $e->getMessage();
        }
    }
?>