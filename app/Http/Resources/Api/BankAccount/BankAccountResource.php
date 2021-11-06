<?php

namespace App\Http\Resources\Api\BankAccount;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
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
            'id'=>$this->id,
            'account_holder_name'=>$this->account_holder_name,
            'bank_name'=>$this->bank_name,
            'account_number'=>$this->account_number,
            'iban_number'  => $this->iban_number,
            'bank_image'=>$this->bank_image

        ];
    }
}
