<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class TransactionRepository
{
  /**
   * Returns all transactions belonging to the current user.
   * @return LengthAwarePaginator
   */
  public function getAllTransacitons(): LengthAwarePaginator
  {
    return Transaction::where('user_id', Auth::id())->paginate();
  }

    /**
   * Returns a transactions belonging to the current user according to transactionId.
   * @return Transaction
   */
  public function getTransaction(int $transactionId): Transaction
  {
    return Transaction::findOrFail($transactionId);
  }

  /**
   * Store a newly created transaction.
   * @param array $data
   * @return Transaction
   */
  public function createTransaction(array $data): Transaction
  {
    $data['user_id'] = Auth::id();
    return Transaction::create($data);
  }

  /**
   * Update the transaction according to transaction ID.
   * @param array $data
   * @param int $transactionId
   * @return bool
   */
  public function updateTransaction(array $data, int $transactionId): bool
  {
    return Transaction::findOrFail($transactionId)->update($data);
  }

  /**
   * Soft deletes the transaction according to transaction ID.
   * @param int $transactionId
   * @return bool
   */
  public function deleteTransaction(int $transactionId): bool
  {
    return Transaction::findOrFail($transactionId)->delete();
  }
}
