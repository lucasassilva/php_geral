<?php
namespace App\Http\Controllers\Dashboard\Pages;
use App\Entities\Item;
use App\Repositories\ItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Validators\ItemValidator;
use Illuminate\Routing\Controller as Controller;

class ItemsController extends Controller
{

    protected $repository;
    protected $validator;


    public function __construct(ItemRepository $repository, ItemValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function index()
    {
        $itens = $this->repository->all();
        return view('dashboard.pages.itens_motos', ['itens'=>$itens, 'user' => Auth::user(),'title'=>'CCAR | Itens']);
    }

    public function search(Request $request){
        try {
            $pesquisar = $request->input('pesquisar');
            $search = Item::where('name', 'LIKE', '%' . $pesquisar . '%')->orWhere('type', 'LIKE', '%' . $pesquisar . '%')->get();
            if (!is_null($search)) {
                return redirect()->route('item.index')->with(['search' => $search->toArray()]);
            } else {
                return back();
            }
        }catch (\Exception $e ) {
            return $e->getMessage();
        }
    }
    
    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $item = $this->repository->create($request->all());
            if(!is_null($item)){
                session()->flash('success', 'O item da moto foi cadastrado com sucesso.');
                return back();
            }else {
                session()->flash('error', 'O item da moto não foi cadastrado.');
                return back();
            }
        }catch (ValidatorException $e){
            return back()->withErrors($e->getMessageBag())->withInput()->with(['create'=>true]);
        }
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        return back()->with(['item'=>$item]);
    }

    public function update(Request $request, $id)
    {
      $item=$this->repository->find($id);
      try{
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        if($item['name']==$request['name'] && $item['type']==$request['type'])
        {
            return back();
        }else{
            $updated = $this->repository->update($request->toArray(),$id);
        }
        if(!is_null($updated)){
            session()->flash('success', 'O item da moto foi editado com sucesso.');
            return back();
        }else{
            session()->flash('error', 'O item da moto não foi editado .');
            return back();
        }
    }catch (ValidatorException $e){
        return back()->withErrors($e->getMessageBag())->with(['item'=> $item->toArray()]);
    }
}
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if(!is_null($deleted)){
            session()->flash('success', 'O item da moto foi excluido com sucesso.');
            return back();
        }else {
            session()->flash('error', 'O item da moto não foi excluido.');
            return back();
        }
    }
}
