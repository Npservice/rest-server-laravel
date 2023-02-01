<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class barangResource extends JsonResource
{
    // define properti
    public $status;
    public $message;
    // memangil kelas yang digunakan
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
    // return ke 3 variable  diatas
    public function toArray($request)
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
