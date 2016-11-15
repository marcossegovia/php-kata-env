#Bowling-kata
We can briefly summarize the scoring for this form of bowling:

* Cada juego son 10 turnos (`frames`).
* En cada frame, el jugador tiene 2 oportunidades(`tries`) para tirar todos los bolos.
* Si el jugador NO tira todos los bolos en ambos turnos, la puntuación de ese frame equivale al total de bolos tirados en ese frame.
* Si el jugador no tira ningún bolo en ambos tries (-), la puntuación de ese frame equivale a 0.
* Si el jugador tira todos los bolos en la SEGUNDA tirada (`spare` /), la puntuación de ese frame equivale a 10 más el número de bolos tirados en su siguiente try (del siguiente turno).
* Si el jugador tira todos los bolos en la PRIMERA tirada (`strike` X), termina el turno y la puntuación de ese frame equivale a 10 más el número de bolos tirados en sus siguientes 2 tries (del siguiente turno o no ;)).
* Si el jugador consigue un spare o un strike en el último frame (el décimo), realizará una o dos tiradas más, respectivamente. Estas tiradas se realizan en el mismo turno y no puede repetirse el proceso. Estos bonus se sumarán al cálculo de puntuación de este último frame.
* La puntuación del jugador es el total de las puntuaciones de todos los frames.
