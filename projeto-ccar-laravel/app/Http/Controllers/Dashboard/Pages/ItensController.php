<?php
namespace App\Http\Controllers\Dashboard\Pages;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ItenRepository;
use App\Validators\ItenValidator;
use App\Entities\Iten;
use Illuminate\Routing\Controller as Controller;

class ItensController extends Controller
{

    protected $repository;
    protected $validator;

    public function __construct(ItenRepository $repository, ItenValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    public function index(){
        $iten = $this->repository->all();
        return view('dashboard.pages.itens_carros', ['iten'=>$iten, 'user' => Auth::user(),'title'=>'CCAR | Itens']);
    }


    public function search(Request $request){
        try {
            $pesquisar = $request->input('pesquisar');
            $search = Iten::where('name', 'LIKE', '%' . $pesquisar . '%')->orWhere('type', 'LIKE', '%' . $pesquisar . '%')->get();
            if (!is_null($search)) {
                return back()->with(['search' => $search->toArray()]);
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
        $iten = $this->repository->create($request->all());
        if(!is_null($iten)){
            session()->flash('success', 'O item do carro foi cadastrado com sucesso.');
            return back();
        }else {
            session()->flash('error', 'O item do carro não foi cadastrado.');
            return back();
        }
    }catch (ValidatorException $e){
        return back()->withErrors($e->getMessageBag())->withInput()->with(['create'=>true]);
    }
}

public function edit($id)
{
    $iten = $this->repository->find($id);
    return back()->with(['iten'=>$iten]);
}

public function update(Request $request, $id)
{
     $iten=$this->repository->find($id);
      try{
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        if($iten['name']==$request['name'] && $iten['type']==$request['type'])
        {
            return back();
        }else{
            $updated = $this->repository->update($request->toArray(),$id);
        }
        if(!is_null($updated)){
            session()->flash('success', 'O item do carro foi editado com sucesso.');
            return back();
        }else{
            session()->flash('error', 'O item do carro não foi editado .');
            return back();
        }
    }catch (ValidatorException $e){
        return back()->withErrors($e->getMessageBag())->with(['iten'=> $iten->toArray()]);
    }
}

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        if(!is_null($deleted)){
            session()->flash('success', 'O item do carro foi excluido com sucesso.');
            return back();
        }else {
            session()->flash('error', 'O item do carro não foi excluido.');
            return back();
        }
    }
}
