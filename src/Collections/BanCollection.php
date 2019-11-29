<?php

namespace TruckersMP\Collections;

use TruckersMP\Models\Ban;

class BanCollection extends Collection
{
    /**
     * Create a new BanCollection instance.
     *
     * @param  array  $bans
     *
     * @return void
     * @throws \Exception
     */
    public function __construct(array $bans)
    {
        parent::__construct();

        foreach ($bans as $key => $ban) {
            $this->items[$key] = new Ban($ban);
        }
    }
}
