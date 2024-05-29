<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veiculo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        class Viagem {

            public $marca, $modelo, $kmInicial, $kmFinal, $gasolinaLitro, $gasolinaTipo, $media, $kmPercorridos, $kmHodometro, $precoGasolina;

            public function setMarca($marca) {
                $this->marca = $marca;
            }
            public function getMarca() {
                return $this->marca;
            }

            public function setModelo($modelo) {
                $this->modelo = $modelo;
            }
            public function getModelo() {
                return $this->modelo;
            }

            public function setKmInicial($kmInicial) {
                $this->kmInicial = $kmInicial;
            }
            public function getkmInicial() {
                return $this->kmInicial;
            }

            public function setKmFinal($kmFinal) {
                $this->kmFinal = $kmFinal;
            }
            public function getKmFinal() {
                return $this->kmFinal;
            }

            public function setKmHodometro($kmHodometro) {
                $this->kmHodometro = $kmHodometro;
            }
            public function getKmHodometro() {
                return $this->kmHodometro;
            }

            public function setGasolinaLitro($gasolinaLitro) {
                $this->gasolinaLitro = $gasolinaLitro;
            }
            public function getGasolinaLitro() {
                return $this->gasolinaLitro;
            }

            public function setPrecoGasolina($precoGasolina) {
                $this->precoGasolina = $precoGasolina;
            }
            public function getPrecoGasolina() {
                return $this->precoGasolina;
            }

            public function setGasolinaTipo($gasolinaTipo) {
                $this->gasolinaTipo = $gasolinaTipo;
            }
            public function getGasolinaTipo() {
                return $this->gasolinaTipo;
            }



            public function imprimir() {

                $kmPercorridos = $this->getKmFinal() - $this->getkmInicial();
                $valorGasolina = $this->getGasolinaLitro() * $this->getPrecoGasolina();
                $media = ($this->getkmFinal() - $this->getkmInicial()) / $this->getGasolinaLitro();

                echo "<h1>Cadastro: </h1>";
                echo "Marca: " . $this->getMarca() . "<br>";
                echo "Modelo: " . $this->getModelo() . "<br>";
                echo "Km Inicial: " . $this->getkmInicial() . "<br>";
                echo "Km Final: " . $this->getKmFinal() . "<br>";
                echo "Kms Hodometro: " . $this->getKmHodometro() . "<br>";
                echo "Kms Percorridos: " . $kmPercorridos . "<br>";
                echo "Litros: " . $this->getGasolinaLitro() . "<br>";
                echo "Tipo da Gasosa: " . $this->getGasolinaTipo() . "<br>";
                echo "Preço da Gasolina: " . $this->getPrecoGasolina() . "<br>";
                $cheio = false;
                if(isset($_POST['completoOTanque'])) {
                    $cheio = true;
                    echo "Encheu o tanque: sim<br>";
                } else {
                    $cheio = false;
                    echo "Encheu o tanque: não<br>";
                }
                echo "Media: " . $media . "<br>";
            }

            public function mandarProBanco() {
                //VEÍCULO
                $database = new Conexao(); //nova instancia da conexao
                $db = $database->getConnection(); //tenta conectar
                
                $sql = "INSERT INTO VALUES veiculo (marca, modelo, kmInicial, kmFinal)(:marca, :modelo, :kmInicial, :kmFinal)";
                try {
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':marca', $this->marca);
                    $stmt->bindParam(':modelo', $this->modelo);
                    $stmt->bindParam(':kmInicial', $this->kmInicial);
                    $stmt->bindParam(':kmFinal', $this->kmFinal);
                    $stmt->execute();
                    return true;
                } catch(PDOExeption $e) { //if(erro==true) {echo $this->mensagem;}
                    echo "Erro ao inserir automóvel: " . $e->getMessage();
                    return false;
                }

                //ABASTECIMENTO
                $database = new Conexao(); //nova instancia da conexao
                $db = $database->getConnection(); //tenta conectar
                
                $sql = "INSERT INTO VALUES abastecimento (gasolinaLitro, gasolinaTipo, kmHodometro, precoGasolina, media, cheio)(:gasolinaLitro, :gasolinaTipo, :kmHodometro, :precoGasolina, :media, :cheio)";
                try {
                    $stmt = $db->prepare($sql);
        
                    $stmt->bindParam(':gasolinaTipo', $this->gasolinaTipo);
                    $stmt->bindParam(':kmPercorridos', $this->kmPercorridos);
                    $stmt->bindParam(':precoGasolina', $this->precoGasolina);
                    $stmt->bindParam(':media', $this->media);
                    $stmt->bindParam(':cheio', $this->cheio);
                    $stmt->execute();
                    return true;
                } catch(PDOExeption $e) { //if(erro==true) {echo $this->mensagem;}
                    echo "Erro ao inserir abastecimento: " . $e->getMessage();
                    return false;
                }
            }
        }  
    ?>
</body>
</html>