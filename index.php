<?php
class Prodotto {
    protected $id;
    protected $nome;
    protected $prezzo;
    protected $categoria;

    public function __construct($id, $nome, $prezzo, $categoria) {
        $this->id = $id;
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->categoria = $categoria;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

    public function getCategoria() {
        return $this->categoria;
        
    }
  
}
class Negozio {
    protected $prodotti = [];

    public function aggiungiProdotto(Prodotto $prodotto) {
        $this->prodotti[] = $prodotto;
    }

    public function getProdotti() {
        return $this->prodotti;
    }

    public function getProdottiPerCategoria($categoria) {
        $prodottiCategoria = [];
        foreach ($this->prodotti as $prodotto) {
            if ($prodotto->getCategoria() === $categoria) {
                $prodottiCategoria[] = $prodotto;
            }
        }
        return $prodottiCategoria;
    }
}


$prodotto1 = new Prodotto(1, "Cibo per cani", 10.99, "Cani");
$prodotto2 = new Prodotto(2, "Giochi per cani", 15.99, "Cani");
$prodotto3 = new Prodotto(3, "Cucce per cani", 50.99, "Cani");
$prodotto4 = new Prodotto(4, "Cibo per gatti", 8.99, "Gatti");
$prodotto5 = new Prodotto(5, "Giochi per gatti", 12.99, "Gatti");
$prodotto6 = new Prodotto(6, "Cucce per gatti", 45.99, "Gatti");

$negozio = new Negozio();
$negozio->aggiungiProdotto($prodotto1);
$negozio->aggiungiProdotto($prodotto2);
$negozio->aggiungiProdotto($prodotto3);
$negozio->aggiungiProdotto($prodotto4);
$negozio->aggiungiProdotto($prodotto5);
$negozio->aggiungiProdotto($prodotto6);

$prodottiPerCani = $negozio->getProdottiPerCategoria("Cani");
$prodottiPerGatti = $negozio->getProdottiPerCategoria("Gatti");




?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online - Prodotti per animali</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: 250px;
            padding: 15px;
            text-align: center;
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .card-title {
            font-weight: bold;
            margin: 10px 0;
        }
        .card-category {
            color: #888;
            margin-bottom: 10px;
        }
        .card-price {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .category-icon {
            width: 50px;
            height: 50px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Shop Online - Prodotti per animali</h1>

    <div class="container">
        <?php
        foreach ($negozio->getProdotti() as $prodotto) {
            echo "<div class='card'>";
            echo "<img src='images/{$prodotto->getId()}.jpg' alt='{$prodotto->getNome()}'>";
            echo "<div class='card-title'>{$prodotto->getNome()}</div>";
            echo "<div class='card-category'>Categoria: {$prodotto->getCategoria()}</div>";
            echo "<div class='card-price'>Prezzo: {$prodotto->getPrezzo()} €</div>";
            echo "<img class='category-icon' src='icone/{$prodotto->getCategoria()}.png' alt='{$prodotto->getCategoria()}'>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>