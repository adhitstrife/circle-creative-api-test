<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->department) {
            $department = $this->department;
        } else {
            $department = 0;
        }

        if ($this->position) {
            $position = $this->position;
        } else {
            $position = 0;
        }
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone_number,
            'department' => $department,
            'position' => $position
        ];
    }
}
