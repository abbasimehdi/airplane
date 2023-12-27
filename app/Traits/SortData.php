<?php

namespace App\Traits;

trait SortData
{
    /**
     * @return void
     */
    public function sortByBubble(): void
    {
        for ($i = $this->length - 1; $i >= 0; $i--) {
            for ($j = 0; $j <= $i; $j++) {
                if ($this->userTickets[$i]['destination'] == $this->userTickets[$j]['origin']) {
                    $temp = $this->userTicketsList[$i];
                    $this->userTicketsList[$i] = $this->userTicketsList[$j];
                    $this->userTicketsList[$i - 1] = $temp;
                } elseif (!$this->userTickets->where('origin', $this->userTickets[$i]['destination'])->first()) {
                    $this->destination = $this->userTickets[$i]->toArray();
                }
            }
        }
    }
}
