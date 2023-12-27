<?php

namespace App\Contracts\User;

use App\Contracts\Base\BaseRepository;
use App\Http\Resources\BaseListCollection;
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
    protected array $destination;
    protected $userTicketsList;
    protected $data;


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

        $this->filerData();

        return (new BaseListCollection(
            collect([
                'origin'      => $this->data->first()['origin'],
                'destination' => $this->data->last()['destination']
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

    /**
     * @return bool
     */
    private function filerData(): bool
    {
        if ($key = array_search($this->destination, $this->data) !== false) {
            unset($this->data[$key]);
            array_push($this->data, $this->destination);
            $this->data = collect($this->data);
        }

        return true;
    }
}
