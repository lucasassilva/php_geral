<?php
namespace App\Http\Controllers\Dashboard\Pages;
use App\Entities\Event;
use App\Http\Requests;
use App\Repositories\EventRepository;
use App\Validators\EventValidator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class EventsController extends Controller
{

    protected $repository;
    protected $validator;

    public function __construct(EventRepository $repository, EventValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $event=$this->repository->all();
        return view('dashboard.pages.agendamentos',['event'=>$event,'user' => Auth::user(),'title'=>'CCAR | Agendamentos']);
    }

public function store(Request $request)
{
     try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $event = $this->repository->create($request->all());
            if(!is_null($event)){
                session()->flash('success', 'O evento foi cadastrado com sucesso.');
                return back();
            }else {
                session()->flash('error', 'O evento não foi cadastrado.');
                return back();
            }
        }catch (ValidatorException $e){
            return back()->withErrors($e->getMessageBag())->withInput()->with(['create'=>true]);
        }
}


public function show($id)
{
    $event = $this->repository->find($id);

    if (request()->wantsJson()) {

        return response()->json([
            'data' => $event,
        ]);
    }

    return view('events.show', compact('event'));
}


public function edit($id)
{
    $event = $this->repository->find($id);
    return view('events.edit', compact('event'));
}


public function update(Request $request, $id)
{
    try {
        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        $event = $this->repository->update($request->all(), $id);
        $response = [
            'message' => 'Event updated.',
            'data'    => $event->toArray(),
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
            'message' => 'Event deleted.',
            'deleted' => $deleted,
        ]);
    }

    return redirect()->back()->with('message', 'Event deleted.');
}
}
