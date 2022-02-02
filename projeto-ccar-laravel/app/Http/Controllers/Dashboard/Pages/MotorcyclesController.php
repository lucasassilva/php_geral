<?php
namespace App\Http\Controllers\Dashboard\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MotorcycleRepository;
use App\Entities\Item;
use App\Entities\Motorcycle;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Validators\MotorcycleValidator;
use Illuminate\Routing\Controller as Controller;

class MotorcyclesController extends Controller
{
    protected $repository;
    protected $validator;


    public function __construct(MotorcycleValidator $validator,MotorcycleRepository $repository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index(Request $request){
        $user=Auth::User();
        $itens = Item::all();
        $motos=$this->repository->all();
        return view('dashboard.pages.motos',['title'=>'CCAR | Motos',Auth::user(),'user'=>$user,'itens'=>$itens,'motos'=>$motos]);
    }


    public function store(Request $request)
    {
        try {
           $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
           $request->fileImage->storeAs('motorcycles', $request->fileImage->getClientOriginalName());
           $request['image']=$request->fileImage->getClientOriginalName();
           $motorcycle = $this->repository->create($request->all());
            if(!is_null($motorcycle)){
                if(!is_null($request['item_id'])) {
                    $data=$this->repository->find($motorcycle['id']);
                    foreach ($request['item_id'] as $row) {
                       $data->motorcycleItem()->attach($row);
                    }
                }
                session()->flash('success', 'A moto foi cadastrada.');
                return back();
            }else{
            session()->flash('error', 'A moto não foi cadastrada.');
            return back();
        }
    } catch (ValidatorException $e) {
        return back()->withErrors($e->getMessageBag())->withInput()->with(['create'=>true]);
    }
 }


    public function edit($id)
    {
        $motorcycle = $this->repository->find($id);
        return back()->with(['motorcycle'=>$motorcycle]);
    }


    public function update(Request $request, $id)
    {
        try{
            $validation = $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $motorcycle=$this->repository->find($id);
            if($motorcycle['type']==$request['type'] && $motorcycle['mileage']==$request['mileage'] && $motorcycle['year']==$request['year'] && $motorcycle['only_owner']==$request['only_owner'] && $motorcycle['image']==$request['fileImage'])
            {
            return back();
          }else{
            $updated = $this->repository->update($request->toArray(),$id);
            session()->flash('success', 'A moto foi editada com sucesso.');
            return back();
        }
    }catch (ValidatorException $e){
        return back()->withErrors($e->getMessageBag())->with(['motorcycle'=> $motorcycle->toArray()]);
    }
}


    public function destroy($id)
    {
         $deleted = $this->repository->delete($id);
         if(!is_null($deleted)){
            session()->flash('success', 'A moto foi excluida com sucesso.');
            return back();
        } else {
            session()->flash('success', 'A moto não foi excluida.');
            return back();
        }
    }
}
