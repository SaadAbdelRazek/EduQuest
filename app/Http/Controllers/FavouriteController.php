<?php

namespace App\Http\Controllers;

use App\Models\favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addToFavourite(Request $request)
    {
        $user = Auth::user();
        $courseId = $request->course_id;

        // Check if the item is already in the favourite
        $favouriteItem = favourite::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->first();


        if (!$favouriteItem) {
            // If not, create a new favourite item
            favourite::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
            ]);
        }
        else{

            return response()->json(['success' => 'The course is already in your favorites.']);
        }

        return response()->json(['success' => 'Course added to favourite']);
    }

    // Function to get all favourite items
    public function viewFavourite()
    {
        $user = Auth::user();
        $favouriteItems = favourite::where('user_id', $user->id)->with('course')->get();

        return view('website.favourites', ['favouriteItems' => $favouriteItems]);
    }

    public function remove($id) {
        $favouriteItem = Favourite::where('course_id', $id)->where('user_id', Auth::id())->first();

        if (!$favouriteItem) {
            return response()->json(['success' => false, 'message' => 'Item not found in favourite.'], 404);
        }

        $favouriteItem->delete();

        return response()->json(['success' => true, 'message' => 'Item removed successfully.']);
    }


    // =================== local =====================

    // public function addBulk(Request $request)
    // {
    //     // التحقق من أن المستخدم مسجل دخوله
    //     if (!Auth::check()) {
    //         return response()->json(['error' => 'You must be logged in to add items to favourites'], 401);
    //     }

    //     // الحصول على قائمة معرفات الكورسات من الطلب
    //     $courseIds = $request->input('course_ids', []);

    //     // التحقق من أن هناك كورسات لإضافتها
    //     if (empty($courseIds)) {
    //         return response()->json(['error' => 'No courses selected'], 400);
    //     }

    //     // الحصول على معرف المستخدم الحالي
    //     $userId = Auth::id();

    //     // حفظ كل كورس في المفضلة للمستخدم الحالي
    //     foreach ($courseIds as $courseId) {
    //         Favourite::create([
    //             'user_id' => $userId,
    //             'course_id' => $courseId,
    //         ]);
    //     }

    //     return response()->json(['success' => 'Courses added to favourites successfully']);
    // }
}
