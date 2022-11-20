<?php

namespace App;

class Util
{
    public static function formataDinheiro($valor) {
        // altera a virgula para um caractere aleatorio
        $vf = str_replace(',', 'Y', number_format($valor, 2));

        // altera o ponto para uma virgula
        $vf = str_replace('.', ',', $vf);

        // altera novamente o valor aletorio para um ponto
        $vf = str_replace('Y', '.', $vf);

        //retorna o valor formatado
        return $vf;
    }
}
