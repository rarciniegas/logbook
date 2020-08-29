<?php namespace App\Controllers;

use App\Models\EntriesModel;
use CodeIgniter\Controller;

class Entries extends Controller
{
    public function index()
    {
        $model = new EntriesModel();

        $data = [
            'entries'  => $model->getEntries(),
            'title' => 'Archive',
        ];

        echo view('templates/header', $data);
        echo view('entries/overview', $data);
        echo view('templates/footer', $data);
    }

    public function view($slug = NULL)
    {
        $model = new EntriesModel();

        $data['entries'] = $model->getEntries($slug);

        if (empty($data['entries']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
        }

        $data['title'] = $data['entries']['title'];

        echo view('templates/header', $data);
        echo view('entries/view', $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $model = new EntriesModel();

        if ($this->request->getMethod() === 'post' && $this->validate([
                'title' => 'required|min_length[3]|max_length[255]',
                'body'  => 'required'
            ]))
        {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ]);
            echo view('templates/header', ['title' => 'The entry has been logged']);
            echo view('entries/success');
            echo view('templates/footer');
        }
        else
        {
            echo view('templates/header', ['title' => 'Create a new entry']);
            echo view('entries/create');
            echo view('templates/footer');
        }
    }
}