<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebAcces extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' =>$this->id,
            'admin_id' => $this->admin_id,
            'admin_email' => $this->admin_email,
            'user_id' => $this->user_id,
            'user_email' => $this->user_email,
            'type_of_task' => $this->type_of_task,
            'wizard_project_name' => $this->wizard_project_name,
            'website' => $this->website,
            'email_address' => $this->email_address,
            'user_name' => $this->user_name,
            'password' => $this->password,
            'page_url' => $this->page_url,
            'maintenance_engineer' => $this->maintenance_engineer,
            'slugname' => $this->slugname,
            'slug_id' => $this->slug_id,
			'all_url' => $this->all_url,
			'name' => $this->name,
			'token' => $this->token,
			'email' => $this->email,
			'city' => $this->city,
           
        ];
    }
}
