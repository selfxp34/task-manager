<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {
        // Алгоритм сохранения комментария к задаче
        $data = $request->all();
        // 2. Создать новый комментарий в БД
        $comment = new \App\Models\Comment();
        $comment->comment=$data['comment'];
        $comment->task_id=$id;
        $comment->save();



        // 3. Перенаправить на деатльную страницу задачи

        return redirect()->route('tasks.show', ['task' => $id]);
    }
}
