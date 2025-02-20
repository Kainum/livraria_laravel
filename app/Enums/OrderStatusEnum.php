<?php

namespace App\Enums;

enum OrderStatusEnum: int
{
    case CART = 1;
    case PAID = 2;
    case COMPLETED = 3;
    case CANCELED = 4;

    public function getName () : string
    {
        return match ($this) {
            self::CART => 'Criado',
            self::PAID => 'Pago',
            self::COMPLETED => 'Finalizado',
            self::CANCELED => 'Cancelado',
            default => 'Status não encontrado',
        };
    }

    public function getStyle ()
    {
        return match ($this) {
            self::CART =>       'px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-800',
            self::PAID =>       'px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-800',
            self::CANCELED =>   'px-2 py-0.5 text-xs rounded-full bg-red-100 text-red-800',
            self::COMPLETED =>  'px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-800',
            default => '',
        };
    }
}
