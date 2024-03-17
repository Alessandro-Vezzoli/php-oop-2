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


?>