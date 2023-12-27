<?php

namespace App\Contracts\User;

use App\Contracts\Base\BaseRepository;
use App\Http\Resources\BaseListCollection;
use App\Models\Schmas\Constants\BaseConstants;
use App\Models\User;
use App\Traits\SortData;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserRepository extends BaseRepository
{
    use SortData;

    protected $userTickets;
    protected $keys;
    protected $length;
    protected $userTicketsList;
    protected $data;
    protected $origin;
    protected $destination;

    /**
     * @return mixed
     */
    public function model(): mixed
    {
        return User::class;
    }

    /**
     * @param int $passportId
     * @return JsonResponse
     */
    public function show(int $passportId): JsonResponse
    {
        $this->userTickets = $this->getUserTickets();
        $this->length = count($this->userTickets);
        $this->userTicketsList = $this->userTickets;
        $this->data = $this->userTickets->toArray();

        // Sort data by Bubble sort algorithm
        $this->sortByBubble();

        return (new BaseListCollection(
            collect([
                BaseConstants::ORIGIN      => $this->origin[BaseConstants::ORIGIN],
                BaseConstants::DESTINATION => $this->destination[BaseConstants::DESTINATION]
            ])
        ))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_OK);
    }

    /**
     * @return mixed
     */
    private function getUserTickets(): mixed
    {
        return User::findUser()->first()->tickets;
    }
}
