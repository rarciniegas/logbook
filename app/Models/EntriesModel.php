<?php namespace App\Models;

use CodeIgniter\Model;

class EntriesModel extends Model
{
    protected $table = 'entries';

    protected $allowedFields = ['title', 'slug', 'body'];

    public function getEntries($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }
}