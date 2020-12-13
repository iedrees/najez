<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task'=> $this->task,
            'end_date'=> $this->end_date,
            'done'=> $this->done,
//            'assigned_user_id'=> $this->assigneduser,
           'user' => new UserTransformer($this->user),
            'assigned_user' => new UserTransformer($this->AssignedUser),
        ];
    }
}
