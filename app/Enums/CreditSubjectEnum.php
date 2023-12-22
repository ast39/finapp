<?php

namespace App\Enums;


enum CreditSubjectEnum: int {

    # Платеж
    case Payment = 1;

    # Сумма
    case Amount  = 2;

    # Процент
    case Percent = 3;

    # Срок
    case Period  = 4;
}
