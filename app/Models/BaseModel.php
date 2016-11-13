<?php

namespace App\Models;

use NukaCode\Core\Models\BaseModel as CoreBaseModel;

abstract class BaseModel extends CoreBaseModel
{
    public function getCreatedAtAttribute()
    {
        return $this->getDate('created_at');
    }

    public function setCreatedAtAttribute($value)
    {
        $this->setDate('created_at', $value);
    }

    public function getUpdatedAtAttribute()
    {
        return $this->getDate('updated_at');
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->setDate('updated_at', $value);
    }

    public function getDeletedAtAttribute()
    {
        return $this->getDate('deleted_at');
    }

    public function setDeletedAtAttribute($value)
    {
        $this->setDate('deleted_at', $value);
    }

    protected function getDate($key)
    {
        if (isset($this->attributes[$key]) && $this->attributes[$key] != null) {
            return carbonParse($this->attributes[$key] . ' UTC');
        }

        return null;
    }

    protected function setDate($key, $value)
    {
        if ($value != null) {
            $this->attributes[$key] = carbonParse($value)->setTimezone('UTC');
        } else {
            $this->attributes[$key] = null;
        }
    }
}
