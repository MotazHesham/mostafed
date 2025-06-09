<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        return view('tenant.admin.home');
    }

    public function arrange(Request $request)
    {
        $model = $request->model;
        $name = $request->name;
        $orderColumn = $request->orderColumn;
        
        $records = $model::orderBy($orderColumn, 'desc')->get();

        $html = view('tenant.partials.arrange', compact('records', 'model', 'name', 'orderColumn'))->render();
        return response()->json(['html' => $html]);
    }

    public function updateArrange(Request $request)
    {
        try {
            // Get JSON data from request
            $data = $request->json()->all();
            
            if (!isset($data['order']) || !is_array($data['order'])) {
                throw new \Exception('Invalid order data received');
            }

            $order = $data['order'];
            $orderColumn = $data['order_column'];
            $model = $data['model'];

            // Update each record's order
            foreach ($order as $item) {
                if (!isset($item['id']) || !isset($item['order'])) {
                    continue; // Skip invalid items
                }
                
                $model::where('id', $item['id'])
                    ->update([$orderColumn => $item['order']]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Order updated successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating order: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating order: ' . $e->getMessage()
            ], 500);
        }
    }
} 