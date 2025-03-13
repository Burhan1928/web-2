<?php

class Animal{

    public $animals;
    public function __construct($ar_animal)
    {
        $this->animals = $ar_animal;

    }

    public function index ()
    {
        foreach ($this->animals as $animal) {
            echo "-$animal <br/>";
        }
    }
    
    public function store($animal) {
        $this->animals[] = $animal;
    }

        

    public function update($index, $animal){
        $this->animals[$index] = $animal; 
    }


    public function destroy($index) {
        unset($this->animals[$index]);
    }

}
#membuat object
$animal =  new Animal(["ayam", "ikan"]);
echo "index - menampilkan seluruh hewan <br/>";
$animal->index();
echo "<br/>";

echo "store - menambahkan hewan baru (burung) <br/>";
$animal->store("burung");
$animal->index();
echo "<br/>";

echo "update - mengupdate hewan <br/>";
$animal->update(0,"kucing anggora");
$animal->index();
echo "<br/>";

echo "destroy - menghapus hewan <br/>";
$animal->destroy(1);
$animal->index();
echo "<br/>";




    
        
    
