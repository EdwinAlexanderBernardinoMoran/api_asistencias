<?php

namespace App\Http\Resources\V1\Resources;

use App\Models\Registration;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student_id,
            'datenow' => $this->datenow,
            'timenow' => $this->timenow,
            'created_at' => $this->published_at
        ];
    }
}
