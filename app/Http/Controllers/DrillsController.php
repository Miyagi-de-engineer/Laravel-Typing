<?php

namespace App\Http\Controllers;

use App\Models\Drill;

use Illuminate\Http\Request;

class DrillsController extends Controller
{

    public function index()
    {
        $drills = Drill::all();
        return view('drills.index', ['drills' => $drills]);
    }

    public function new()
    {
        return view('drills.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'problem0' => 'required|string|max:255',
            'problem1' => 'string|nullable|max:255',
            'problem2' => 'string|nullable|max:255',
            'problem3' => 'string|nullable|max:255',
            'problem4' => 'string|nullable|max:255',
            'problem5' => 'string|nullable|max:255',
            'problem6' => 'string|nullable|max:255',
            'problem7' => 'string|nullable|max:255',
            'problem8' => 'string|nullable|max:255',
            'problem9' => 'string|nullable|max:255',
        ]);

        $drill = new Drill;

        $drill->fill($request->all())->save();

        return redirect('/drills/new')->with('flash_message', __('Registered'));
    }

    public function edit($id)
    {

        // IDが数値なのかをチェックする　※無駄なDBへの問い合わせをなくすため
        if (!ctype_digit($id)) {
            return redirect('drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        return view('drills.edit', ['drill' => $drill]);
    }

    public function update(Request $request, $id)
    {
        // IDが数値なのかをチェックする　※無駄なDBへの問い合わせをなくすため
        if (!ctype_digit($id)) {
            return redirect('drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        $drill->fill($request->all())->save();

        return redirect('/drills')->with('flash_message', __('Update Complete.'));
    }

    public function delete($id)
    {
        // IDが数値なのかをチェックする　※無駄なDBへの問い合わせをなくすため
        if (!ctype_digit($id)) {
            return redirect('drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        Drill::find($id)->delete();

        return redirect('/drills')->with('flash_message', __('Deleted'));
    }
}
