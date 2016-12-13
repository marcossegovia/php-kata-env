#Gilded Rose Kata 

Se trata de una empresa que ejecuta diáriamente un script desde el fichero `index.html`. En este script se ejecuta 
la función `update_quality()` que se encarga de actualizar la calidad (`quality`) y los días restantes para poder
venderse (`sellIn`) de un conjunto de productos (`items`). 

La pieza `gilded_rose.js` utiliza un array de items distintos añadidos préviamente desde el código ubicado en el script.

Cosas a tener en cuenta para realizar la Kata:

1. **Puntos generales**:

a) Todos los items tienen una fecha de venta (`SellIn`), que especifica el número de días que tenemos para vender el item.

b) Todos los items tienen una calidad (`Quality`), que especifica el valor que tiene un item.

c) Al final del día el sistema reduce en una unidad los dos valores de cada item.

2. **Puntos especificos**:

a) Si `sellIn` ha pasado, la calidad se reduce el doble `(sellIn <= 0 ? $quality-= 2 : $quality--;)`.

b) La `quality` de un item **NUNCA** puede ser negativa.

c) La `quality` de un item **NUNCA** puede sobrepasar 50.

3. **Excepciones**:

a) Item `Aged Brie` **INCREMENTA** la `quality` cuanto más viejo es (cuánto menor es la fecha de venta, `sellIn`).

b) Item `Sulfuras` al ser legendario, **NUNCA** disminuye ni su `sellIn` ni su `quality`, donde su `quality` es de 80.

c) Item `Backstage passes` que igual que `Aged Brie`, **INCREMENTA** su `quality` cuanto menor es su `sellIn`, según 
lo siguiente:
* `sellIn` <= 10 : `quality` aumenta x2.
* `sellIn` <= 5 : `quality` aumenta x3.
* `sellIn` < 0 : `quality` tiene valor 0.


##Qué hay que hacer?

Añadir un nuevo item `Conjured`. Para éste item su `quality` disminuye el doble de rápido que los items normales. 

> * Total libertad realizar cambios en la función `update_quality()`.
> * No se puede modificar la clase `Item` ni sus propiedades.

Ficheros que intervienen:

- `src/GildedRoseKata/gilded_rose.js`: En este fichero hay la función `update_quality` y la función `item` que contiene
 las propiedades de un item.
- `index.html`: Script que se ejecuta cada día.

En esta Kata se aconseja hacer TDD para tener cubiertos todos los casos y evitar errores entre iteraciones de
refactorización. Para javascript se usa la librería `jasmine` que contiene una serie de funciones para poder implementar
los tests. El test inicial se encuentra en `spec/GildedRose/gilded_rose_spec.js`. Para ejecutarlos sólo hay que cargar
en el navegador el fichero `SpecRunner.html`.
