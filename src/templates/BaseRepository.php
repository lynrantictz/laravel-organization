<?php
/**
 * @vendor: Lynrantic co ltd
 * @developer: Hamis Hamis
 * @email: developer@lynrantic.co.tz
 * Date: 07/18/2021
 */
namespace App\Repositories;

use Illuminate\Support\Facades\DB;


class BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }

    public function all()
    {
        return call_user_func(static::MODEL.'::all');
    }

    public function findByUuid($uuid)
    {
        return $this->query()->where('uuid', $uuid)->first();
    }

    /**
     * @param array $input
     * @return mixed
     * Regex column search
     */
    public function regexColumnSearch(array $input)
    {
        $return = $this->query();
        if ($input) {
            $sql = $this->regexFormatColumn($input)['sql'];
            $keyword = $this->regexFormatColumn($input)['keyword'];
            $return = $this->query()->whereRaw($sql, $keyword);
        }
        return $return;
    }

    /**
     * @param array $input
     * @return array
     * Regex format according to drive used
     */
    public function regexFormatColumn(array $input)
    {
        $keyword = [];
        $sql = "";
        if ($input) {
            switch (DB::getDriverName()) {
                case 'pgsql':
                    foreach ($input as $key => $value) {
                        $sql .= " cast({$key} as text) ~* ? or";
                        $keyword[] = $value;
                    }
                    break;
                default:
                    foreach ($input as $key => $value) {
                        $value = strtolower($value);
                        $sql .= " LOWER({$key}) REGEXP  ? or";
                        $keyword[] = $value;
                    }
            }
            $sql = substr($sql, 0, -2);
            $sql = "( {$sql} )";
        }
        return ['sql' => $sql, 'keyword' => $keyword];
    }

    public function forSelect()
    {
        return $this->query()->where('isactive', 1)->pluck('name', 'id');
    }

}