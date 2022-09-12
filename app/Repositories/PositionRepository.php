<?php

namespace App\Repositories;

use App\Models\Position;
use Carbon\Carbon;

class PositionRepository
{
    public function getAllPositionPaginate($count = 10) {
        $data = Position::paginate($count);
        return $data;
    }

    public function createPosition($request) {
        $Position = Position::updateOrCreate(
            [
                'position_name' => $request->position_name
            ]
        );
        return $Position;
    }

    public function showDetailPosition($id) {
        return Position::with('employees')->findOrFail($id);
    }

    public function updatePosition($request, Position $position) {

        $isPositionNameAlreadyExist = $this->checkExistingPosition($position->id, $request->position_name);
        if($isPositionNameAlreadyExist) {
            return response()->json([
                'status' => 422,
                'message' => 'Duplicate'
            ]);
        } else {
            $position->update([
                'position_name' => $request->position_name
            ]);
        }

        return $position;
    }

    public function deletePosition(Position $position) {

        $updateEmployee = $position->employees()->update([
            'position_id' => null
        ]);

        $isDeleted = $position->delete();

        if($isDeleted) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
    }

    private function checkExistingPosition($id, $name) {
        $data = Position::where('id', '!=', $id)->where('position_name', $name)->first();
        if(isset($data)) {
            return true;
        } else {
            return false;
        }
    }
}
