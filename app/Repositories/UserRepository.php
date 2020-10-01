<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

    private function lookupFieldByRegexp(Builder $users, string $field, ?string $val): Builder
    {
        if (NULL !== $val){
            /* TODO sanitisation here */
            $users->where($field, 'REGEXP', $val);
        }
        return $users;
    }

    public function model()
    {
        return User::class;
    }

    public function getUsersByRegex(?string $id, ?string $first_name, ?string $second_name, ?string $country, ?string $phone, ?string $company)
    {
        $users = User::query();

        $users = $this->lookupFieldByRegexp($users, 'id', $id);
        $users = $this->lookupFieldByRegexp($users, 'first_name', $first_name);
        $users = $this->lookupFieldByRegexp($users, 'second_name', $second_name);
        $users = $this->lookupFieldByRegexp($users, 'country', $country);
        $users = $this->lookupFieldByRegexp($users, 'phone', $phone);
        $users = $this->lookupFieldByRegexp($users, 'company', $company);

        return $users->get();
    }
}