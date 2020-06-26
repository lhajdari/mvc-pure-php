<?php

class AdminController
{
    public function index()
    {
        return view('admin/index');
    }

    public function assignShop()
    {
      $data['shops'] = db()->selectAll('shops');
      $data['assistants'] = db()->selectAll('assistants');
      return view('admin/assistants/assign-shop', $data);
    }

    public function storeAssignShop()
    {
      $data = $this->validate($_POST);
      db()->insert('assistant_shop', $data);
      return redirect('admin');
    }

    public function assistantList()
    {
        $data = db()->selectAll('assistants');
        return view('admin/assistants/index', compact('data'));
    }
    
    public function createAssistant()
    {
        return view('admin/assistants/create');
    }

    public function storeAssistant()
    {

        $data = $this->validate($_POST);

        if (!$data) {
            $error = 'Please do not leave any empty field!';
            return redirect('admin/assistant-create', $error);
        }

        db()->insert('assistants', $data);

        return redirect('admin/assistants');
    }

    public function shopList()
    {
      $data = db()->selectAll('shops');
      return view('admin/shops/index', compact('data'));
    }

    public function storeShop()
    {
        $data = $this->validate($_POST);
        db()->insert('shops',$data);
        return redirect('admin/shops');
    }

    public function createShop()
    {
        $data = db()->selectAll('cities');
        return view('admin/shops/create', compact('data'));
    }

    public function cityList()
    {
      $data = db()->selectAll('cities');
      return view('admin/cities/index', compact('data'));
    }

    public function createCity()
    {
        return view('admin/cities/create');
    }

    public function storeCity()
    {
        $data = $this->validate($_POST);
        db()->insert('cities', $data);
        return redirect('admin/cities');
    }

    protected function validate($data)
    {
        $validated = [];
        foreach ($data as $key => $input) {
            $validated[$key] = htmlspecialchars($input);
            if (empty($validated[$key])) {
                return false;
            }
        }
        return $validated;
    }
}
