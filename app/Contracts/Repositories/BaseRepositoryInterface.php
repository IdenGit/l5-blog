<?php namespace App\Contracts\Repositories;

interface BaseRepositoryInterface
{
    /**
     * @param int $take
     * @return mixed
     */
    public function getAll($take = 5);

    /**
     * @param int $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getItem($id);

    /**
     * @param array $input
     * @return bool
     */
    public function create($input = []);

    /**
     * @param int   $id
     * @param array $input
     * @return mixed
     */
    public function update($id, $input = []);


    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}