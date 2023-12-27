<?php

namespace App\Traits;

use App\Models\Schmas\Constants\BaseConstants;

trait SortData
{
    /**
     * @return void
     */
    public function sortByBubble(): void
    {
        for ($i = $this->length - 1; $i >= 0; $i--) {
            for ($j = 0; $j <= $i; $j++) {
                if (
                    $this->userTickets[$i][BaseConstants::DESTINATION] == $this->userTickets[$j][BaseConstants::ORIGIN]
                ) {
                    $temp = $this->userTicketsList[$i];
                    $this->userTicketsList[$i] = $this->userTicketsList[$j];
                    $this->userTicketsList[$i - 1] = $temp;
                } elseif (
                    !$this->origin &&
                    !$this->userTickets->where(BaseConstants::DESTINATION, $this->userTickets[$i][BaseConstants::ORIGIN]
                    )->first()
                ) {
                    $this->origin = $this->userTickets[$i]->toArray();
                } elseif (
                    !$this->userTickets->where(BaseConstants::ORIGIN, $this->userTickets[$i][BaseConstants::DESTINATION]
                    )->first()
                ) {
                    $this->destination = $this->userTickets[$i]->toArray();
                }
            }
        }
    }
}
