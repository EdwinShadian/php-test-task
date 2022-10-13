<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tender\TenderCreateRequest;
use App\Http\Requests\Tender\TenderIndexRequest;
use App\Http\Requests\Tender\TenderUpdateRequest;
use App\Http\Resources\TenderResource;
use App\Repository\Tender\TenderRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Response;

class TenderController extends Controller
{
    public function __construct(
        private TenderRepository $tenderRepository
    ) {
    }

    public function index(TenderIndexRequest $request)
    {
        $filters = $request->validated();

        $data = $this->tenderRepository->findMany($filters);

        return TenderResource::collection($data);
    }

    public function show(int $id)
    {
        try {
            $data = $this->tenderRepository->findById($id);

            return new TenderResource($data);
        } catch (ModelNotFoundException $exception) {
            return Response::json(['message' => 'Not Found'], 404);
        }
    }

    public function store(TenderCreateRequest $request)
    {
        $data = $request->validated();

        $tender = $this->tenderRepository->create($data);

        return new TenderResource($tender);
    }

    public function update(TenderUpdateRequest $request, int $id)
    {
        $data = $request->validated();

        if ([] === $data) {
            return Response::json(['message' => 'Not Modified'], 304);
        }

        $tender = $this->tenderRepository->findById($id);
        $tender = $this->tenderRepository->update($tender, $data);

        return new TenderResource($tender);
    }

    public function destroy(int $id)
    {
        $tender = $this->tenderRepository->findById($id);
        $tender->delete();

        return Response::json([], 204);
    }
}
