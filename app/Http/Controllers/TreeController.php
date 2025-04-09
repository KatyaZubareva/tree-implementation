<?php

namespace App\Http\Controllers;

use App\Models\TreeNode;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public function index()
    {
        $nodes = TreeNode::whereNull('parent_id')->with('children.children')->get();
        return view('tree.index', compact('nodes'));
    }

    public function flat()
    {
        $nodes = TreeNode::with('parent')->get();
        return view('tree.flat', compact('nodes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:tree_nodes,id'
        ]);

        TreeNode::create($validated);

        return redirect()->route('tree.index');
    }

    public function destroy(TreeNode $node)
    {
        $node->delete();
        return redirect()->route('tree.index');
    }
}