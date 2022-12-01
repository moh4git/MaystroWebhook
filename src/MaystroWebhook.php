<?php

namespace Moh4git\MaystroWebhook;

use Illuminate\Http\Request;
/**
 *   Controlling MaystroWebhook
 *   PHP module for the MaystroWebhook JSON API
 *   @author Moh4shine <moh4shine@gmail.com>
 *   @copyright Copyright (c) 2022 Moh4git
 *
 */
trait MaystroWebhook
{
    protected $maystro_webhook = [];
    protected $response_data   = [];

    public function endpoint(Request $request)
    {
        $this->maystro_webhook = $request->all();
        $this->beautifyData();
        return response()->json('success', 200);
    }

    public function responseData()
    {
        \Log::debug(['log_type' => 'maystro-delivery', 'data' => $this->response_data]);
    }

    protected function beautifyData()
    {
        $this->response_data = collect($this->maystro_webhook)->map(function ($item, $key)
        {
            if ('message' === $key)
            {
                return collect($item)->map(function ($item, $key)
                {
                    if ('data' === $key)
                    {
                        return json_decode(base64_decode($item), true);
                    }

                    return $item;
                });
            }
            return $item;
        });
        $this->responseData();
    }
}
