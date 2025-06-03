<?php

namespace App\Http\Controllers\Tenant\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('due_date')->get();

        return view('tenant.admin.tasksCalendars.index', compact('events'));
    }
}
