<?php namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Models\BaseModel;
use Mobileka\ScopeApplicator\Laravel\Repository;

/**
 * Class BaseEloquentRepository
 * @package App\Repositories
 */
abstract class BaseEloquentRepository extends Repository implements BaseRepositoryInterface
{
    /**
     * @var \App\Models\BaseModel
     */
    protected $dataProvider;

    /**
     * @param \App\Models\BaseModel $dp
     */
    public function __construct(BaseModel $dp)
    {
        $this->dataProvider = $dp;
    }

    /**
     * @param array $scopes
     * @param int   $take
     * @return mixed
     */
    public function getAll($scopes = [], $take = 5)
    {
        return $this->applyScopes($this->dataProvider, $scopes)->paginate($take);
    }

    /**
     * @param int $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function getItem($id)
    {
        return $this->dataProvider->find($id);
    }

    /**
     * @param array $input
     * @return bool
     */
    public function create($input = [])
    {
        $this->dataProvider->fill($input);
        return $this->dataProvider->save();
    }

    /**
     * @param int $id
     * @param array $input
     * @return mixed
     */
    public function update($id, $input = [])
    {
        $model = $this->getItem($id);
        $model->fill($input);

        return $model->save();
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $model = $this->getItem($id);
        return $model->delete();
    }
}