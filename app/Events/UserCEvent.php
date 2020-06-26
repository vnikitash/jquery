<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 26.06.2020
 * Time: 20:19
 */

namespace App\Events;

use App\User;
use Illuminate\Queue\SerializesModels;


class UserCEvent
{
    use SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}