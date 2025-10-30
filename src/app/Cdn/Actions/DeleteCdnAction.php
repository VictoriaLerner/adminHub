<?php

namespace app\Cdn\Actions;
use App\Models\Cdn;
class DeleteCdnAction
{
    public function execute(Cdn $cdn): void
    {
        $cdn->delete();
    }
}
