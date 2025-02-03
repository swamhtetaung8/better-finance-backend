<?php

namespace App\Http\Controllers;

use App\Helpers\HandleRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @var TransactionRepository
     */
    protected $transactionRepository;
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    /**
     * Returns a list of transactions belonging to current user.
     */
    public function index()
    {
        return response()->json($this->transactionRepository->getAllTransacitons());
    }

    /**
     * Store a newly created transaction.
     */
    public function store(StoreTransactionRequest $request)
    {
        return HandleRequest::handle(
            fn() => $this->transactionRepository->createTransaction($request->validated()),
            'Transaction is created successfully',
            201
        );
    }

    /**
     * Update the transaction according to transaction ID.
     */
    public function update(UpdateTransactionRequest $request, int $transactionId)
    {
        return HandleRequest::handle(
            fn() => $this->transactionRepository->updateTransaction($request->validated(), $transactionId),
            'Transaction is updated successfully',
            200
        );
    }

    /**
     * Soft deletes the transaction according to transaction ID.
     */
    public function show(Request $request, int $transactionId)
    {
        // @TODO: check if the transaction belongs to the current user

        try {
            return response()->json(data: $this->transactionRepository->getTransaction($transactionId));
        } catch(\Exception $e) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
    }

    /**
     * Soft deletes the transaction according to transaction ID.
     */
    public function destroy(Request $request, int $transactionId)
    {
        // @TODO: check if the transaction belongs to the current user

        return HandleRequest::handle(
            fn() => $this->transactionRepository->deleteTransaction($transactionId),
            'Transaction is deleted successfully',
            204
        );
    }
}
