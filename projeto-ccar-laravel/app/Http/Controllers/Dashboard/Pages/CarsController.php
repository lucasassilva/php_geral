<?php
namespace App\Http\Controllers\Dashboard\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\CarRepository;
use App\Entities\Car;
use Illuminate\Routing\Controller as Controller;


class CarsController extends Controller
{

    protected $repository;


    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $user=Auth::User();
        return view('dashboard.pages.carros',['title'=>'CCAR | Carros','user'=>$user]);
    }


    public function store(Request $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $car = $this->repository->create($request->all());

            $response = [
                'message' => 'Car created.',
                'data'    => $car->toArray(),
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
        $car = $this->repository->find($id);

        return view('cars.edit', compact('car'));
    }


    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $car = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Car updated.',
                'data'    => $car->toArray(),
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
                'message' => 'Car deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Car deleted.');
    }
}
