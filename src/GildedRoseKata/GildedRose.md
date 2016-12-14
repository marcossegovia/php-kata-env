#Gilded Rose Kata 

Se trata de una empresa que ejecuta diáriamente un script llamado `main_script.php`. En este script se ejecuta el método 
`GildedRose::updateQuality()` que se encarga de actualizar la calidad (`quality`) y los días restantes para poder
venderse (`sellIn`) de un conjunto de productos (`items`). 

La pieza `GildedRose` recibe por el `__construct` un array de items distintos.

Cosas a tener en cuenta para realizar la Kata:

1.**Puntos generales**:

a) Todos los items tienen una fecha de venta (`SellIn`), que especifica el número de días que tenemos para vender el item.

b) Todos los items tienen una calidad (`Quality`), que especifica el valor que tiene un item.

c) Al final del día el sistema reduce en una unidad los dos valores de cada item.

2.**Puntos especificos**:

a) Si `sellIn` ha pasado, la calidad se reduce el doble `($sellIn <= 0 ? $quality-= 2 : $quality--;)`.

b) La `quality` de un item **NUNCA** puede ser negativa.

c) La `quality` de un item **NUNCA** puede sobrepasar 50.

3.**Excepciones**:

a) Item `Aged Brie` **INCREMENTA** la `quality` cuanto más viejo es (cuánto menor es la fecha de venta, `sellIn`).

b) Item `Sulfuras` al ser legendario, **NUNCA** disminuye ni su `sellIn` ni su `quality`, donde su `quality` es de 80.

c) Item `Backstage passes` que igual que `Aged Brie`, **INCREMENTA** su `quality` cuanto menor es su `sellIn`, según 
lo siguiente:
* `sellIn` <= 10 : `quality` aumenta x2.
* `sellIn` <= 5 : `quality` aumenta x3.
* `sellIn` <= 0 : `quality` tiene valor 0.


##Qué hay que hacer?

Añadir un nuevo item `Conjured`. Para éste item su `quality` disminuye el doble de rápido que los items normales. 

> * Total libertad realizar cambios en el método `GildedRose::updateQuality()`.
> * No se puede modificar la clase `Item` ni sus propiedades.

Ficheros que intervienen:

- `src/GildedRoseKata/GildedRose.php`: Clase `GildedRose` donde hay la implementación del método `updateQuality`.
- `src/GildedRoseKata/Item.php`: Clase `Item`.
- `main_script.php`: Script que se ejecuta cada día.

En esta Kata se aconseja hacer TDD para tener cubiertos todos los casos y evitar errores entre iteraciones de
refactorización.
