<?php
namespace App\Http\Controllers\Dashboard\Pages;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\FabricatorCarRepository;
use App\Validators\FabricatorCarValidator;
use Illuminate\Support\Facades\Auth;
use App\Entities\FabricatorCar;
use Illuminate\Routing\Controller as Controller;

class FabricatorCarsController extends Controller
{

    protected $repository;
    protected $validator;


    public function __construct(FabricatorCarRepository $repository, FabricatorCarValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function index()
    {
     $fabricatorCar = $this->repository->all();
     return view('dashboard.pages.fabricantes_carros', ['fabricantes'=>$fabricatorCar, 'user' => Auth::user(),'title'=>'CCAR | Fabricantes']);
 }


 public function store(Request $request)
 {
    try {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        $fabricatorCar = $this->repository->create($request->all());

        $response = [
            'message' => 'FabricatorCar created.',
            'data'    => $fabricatorCar->toArray(),
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
    $fabricatorCar = $this->repository->find($id);

    return view('fabricatorCars.edit', compact('fabricatorCar'));
}

public function update(Request $request, $id)
{
    try {

        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        $fabricatorCar = $this->repository->update($request->all(), $id);

        $response = [
            'message' => 'FabricatorCar updated.',
            'data'    => $fabricatorCar->toArray(),
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
    $deleted = $this->repository->delete($id);

    if (request()->wantsJson()) {

        return response()->json([
            'message' => 'FabricatorCar deleted.',
            'deleted' => $deleted,
        ]);
    }

    return redirect()->back()->with('message', 'FabricatorCar deleted.');
}
}
