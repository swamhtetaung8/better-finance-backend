<?php

namespace App\Helpers;

class HandleRequest
{
  /**
   * Handles controller operations with standardized response and exception handling
   */
  public static function handle(callable $operation, string $successMessage, int $successStatus)
  {
    try {
      $operation();
      return response()->json([
        'status' => true,
        'message' => $successMessage,
      ], $successStatus);
    } catch (\Exception $e) {
      return response()->json([
        'status' => false,
        'message' => $e->getMessage(),
      ], 400);
    }
  }
}
