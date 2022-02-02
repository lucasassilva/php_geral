<?php
namespace App\Http\Controllers\Dashboard\Pages;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\FabricatorMotorcycleRepository;
use App\Validators\FabricatorMotorcycleValidator;
use Illuminate\Support\Facades\Auth;
use App\Entities\FabricatorMotorcycle;
use Illuminate\Routing\Controller as Controller;

class FabricatorMotorcyclesController extends Controller
{

    protected $validator;


    public function __construct(FabricatorMotorcycleRepository $repository, FabricatorMotorcycleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function index()
    {
       $fabricatorMotorcycle=$this->repository->all();
       return view('dashboard.pages.fabricantes_motos', ['fabricantes'=>$fabricatorMotorcycle, 'user' => Auth::user(),'title'=>'CCAR | Fabricantes']);
    }


    public function store(Request $request)
    {
        dd(true);
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $fabricatorMotorcycle = $this->repository->create($request->all());

            $response = [
                'message' => 'FabricatorMotorcycle created.',
                'data'    => $fabricatorMotorcycle->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

 
    public function edit($id)
    {
        $fabricatorMotorcycle = $this->repository->find($id);
        return view('fabricatorMotorcycles.edit', compact('fabricatorMotorcycle'));
    }

   
    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $fabricatorMotorcycle = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'FabricatorMotorcycle updated.',
                'data'    => $fabricatorMotorcycle->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    public function destroy($id)
    {
        dd(true);
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'FabricatorMotorcycle deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'FabricatorMotorcycle deleted.');
    }
}
