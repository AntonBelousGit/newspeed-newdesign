<?php


namespace App\Action\Filter;

use Throwable;

class SetFilterAction
{
    public function handle($filter, $data)
    {
        try {
            return app()->make($filter, ['queryParams' => array_filter($data)]);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
    }
}
